'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  class user extends Model {
    static associate(models) {
      user.hasMany(models.post, {
        foreignKey: "userId",
        as: "posts",
      });
    }
  }
  user.init({
    firstName: DataTypes.STRING,
    lastName: DataTypes.STRING,
    email: DataTypes.STRING,
    password: DataTypes.STRING,
    isAdmin: DataTypes.INTEGER
  }, {
    sequelize,
    modelName: 'user',
  });
  return user;
};