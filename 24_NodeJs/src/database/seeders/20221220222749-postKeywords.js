'use strict';

const faker = require("faker");

/** @type {import('sequelize-cli').Migration} */
module.exports = {
  async up (queryInterface, Sequelize) {

    for (let i = 0; i < 10; i++) {
      await queryInterface.bulkInsert("postKeywords", [
        {
          postId: Math.ceil(Math.random() * 10),
          keywordId: Math.ceil(Math.random() * 10),
        },
      ],
      {}
      );      
    }
  },

  async down (queryInterface, Sequelize) {

    await queryInterface.bulkDelete('postKeywords', null, {});
    
  }
};