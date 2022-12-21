'use strict';

const bcrypt = require("bcrypt");
const faker = require("faker");

/** @type {import('sequelize-cli').Migration} */
module.exports = {
  async up (queryInterface, Sequelize) {

    for (let i = 0; i < 20; i++) {
      await queryInterface.bulkInsert("posts", [
        {
          title: faker.lorem.sentence(),
          slug: faker.lorem.slug(),
          content: faker.lorem.paragraph(),
          userId: Math.ceil(Math.random() * 10),
        },
      ],
      {}
      );      
    }
  },

  async down (queryInterface, Sequelize) {

    await queryInterface.bulkDelete('posts', null, {});
    
  }
};