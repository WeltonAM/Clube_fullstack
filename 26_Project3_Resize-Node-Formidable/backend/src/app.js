const express = require("express");
const cors = require("cors");
const app = express();

app.use(cors());
app.use(express.json());
app.use("/image", require("../routes/upload"));

app.listen(3000);