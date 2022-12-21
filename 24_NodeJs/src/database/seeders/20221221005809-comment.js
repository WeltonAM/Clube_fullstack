'use strict';

const faker = require("faker");

/** @type {import('sequelize-cli').Migration} */
module.exports = {
  async up (queryInterface, Sequelize) {

    for (let i = 0; i < 10; i++) {
      await queryInterface.bulkInsert("comments", [
        {
          userId: Math.ceil(Math.random() * 10),
          postId: Math.ceil(Math.random() * 10),
          comment: faker.lorem.paragraphs(),
        },
      ],
      {}
      );      
    }
  },

  async down (queryInterface, Sequelize) {

    await queryInterface.bulkDelete('comments', null, {});
    
  }
};