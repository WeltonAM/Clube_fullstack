const express = require('express');
const router = express.Router();
const Image = require("../controllers/Image");

router.post('/', Image.upload)

module.exports = router;