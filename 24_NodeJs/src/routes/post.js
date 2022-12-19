const express = require('express');
const Post = require('../controllers/Post');

const router = express.Router();

router.get('/edit/:id', Post.edit);

module.exports = router;