const express = require('express');
const Post = require('../controllers/Post');

const router = express.Router();

router.get('/edit/:id', Post.edit);
router.post('/store', Post.store);
router.put('/update/:id', Post.update);
router.delete('/delete/:id', Post.destroy);

module.exports = router;