'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  class comment extends Model {
    static associate(models) {
      comment.belongsTo(models.user,{
        foreignKey:'userId',
        as: 'user',
      })
      
    }
  }
  comment.init({
    userId: DataTypes.INTEGER,
    postId: DataTypes.INTEGER,
    comment: DataTypes.TEXT
  }, {
    sequelize,
    modelName: 'comment',
  });
  return comment;
};