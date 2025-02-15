const express = require('express');
const path = require('path');
const bcrypt = require('bcryptjs');
const collection = require("./config");
const xss = require('xss');
const cookieParser = require('cookie-parser'); 

const app = express();

app.use(cookieParser()); 

app.set('views', path.join(__dirname, '../views')); //define o local da pasta views pro codigo conseguir se localizar
app.use(express.static(path.join(__dirname, "../public"))); //define onde o codigo deve proucurar arquivos estaticos (css, js, imagens)
app.use(express.json()); // analise de pedidos json
app.use(express.urlencoded({ extended: false })); // analise de pedidos url
app.set('view engine', 'ejs'); //renderizar as paginas com ejs

//pagina inicial
app.get("/login", (req, res) => {
    res.render("login", { message: null });
});

app.get("/", (req, res) => {
    res.sendFile(path.join(__dirname, "../public/HTML/index.html"));
});

//pagina home
app.get("/home", (req, res) => {
    const accountName = req.cookies.accountName; // pega o valor dos cookies que presumidamente foram pegos ao fazer login/cadastro

    if (!accountName) {
        return res.redirect("login"); // se nao achar, manda pro login (linha 19)
    }

    res.render("home", { accountName: accountName }); //manda pro home junto do accountname
});

app.get("/signup", (req, res) => { //mesma coisa do login, se tiver no codigo "/signup" manda pra pagina de signup
    res.render("signup", { message: null }); //seta um valor pra mensagem se nao da erro
});

app.post('/logout', (req, res) => { //auto explicativo
    res.clearCookie('accountName');
    res.redirect('login');
});

app.post("/signup", async (req, res) => {
    //pega os valores do formulario
    const data = {
        name: xss(req.body.username),
        password: xss(req.body.password)
    };

    if (data.name.length > 10) {
        return res.render("signup", { message: "Usuário muito longo (Limite: 10 digitos)" });
    }
    
    //tenta achar algum user igual
    const alreadyExists = await collection.findOne({ name: data.name });
    if (alreadyExists) {
        //manda de volta
        return res.render("signup", { message: "Usuário já registrado" });
    } else {
        // se nao, criptografa a senha e salva ela
        const saltRounds = 10;
        const hashedPass = await bcrypt.hash(data.password, saltRounds);
        data.password = hashedPass;
        
        await collection.insertOne(data);

        res.cookie('accountName', xss(req.body.username), { httpOnly: true, secure: false }); 
        return res.redirect("/home");
    }
});

//logica login
app.post("/login", async (req, res) => { //ativado pelo form do ejs
    try {

        //pega o resultado de nome do formulario, proucura na coleçao importada do config se existe algum correspondente
        const checkUser = await collection.findOne({ name: xss(req.body.username) });
        if (!checkUser) {
            return res.render("login", { message: "Usuário não registrado" });
        }

        //checa se as senhas batem, bcrypt compara uma linha de texto normal com uma codificada
        const checkPass = await bcrypt.compare(req.body.password, checkUser.password);
       
        if (checkPass) {
            //se deu certo, armazena o cookie do nome pra ser usado depois e pra servir de verificação
            res.cookie('accountName', xss(req.body.username), { httpOnly: true, secure: false }); 
            return res.redirect("/home");
        } else {
            return res.render("login", { message: "Senha Incorreta" });
        }
    } catch (error) {
        console.error("Error during login:", error);
        return res.render("login", { message: "Erro: Tente novamente" });
    }
});



//port vercel
module.exports = app;
