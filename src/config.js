const mongoose = require('mongoose');

const connect = mongoose.connect(process.env.URL)
connect.then(() => {
    console.log("Database connected");
})
.catch(() => {
    console.error("Error:");
});

const LoginSchema = new mongoose.Schema({
    name: {
        type: String,
        required: true
    },
    password: {
        type: String,
        required: true
    }
});

const collection = new mongoose.model("users", LoginSchema);

module.exports = collection;
