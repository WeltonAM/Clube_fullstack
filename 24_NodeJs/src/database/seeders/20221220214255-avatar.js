'use strict';

/** @type {import('sequelize-cli').Migration} */
module.exports = {
  async up (queryInterface, Sequelize) {

    for (let i = 0; i < 10; i++) {
      await queryInterface.bulkInsert("avatars", [
        {
          path: 'avatar.png',
          userId: Math.ceil(Math.random() * 10),
        },
      ],
      {}
      );      
    }
  },

  async down (queryInterface, Sequelize) {

    await queryInterface.bulkDelete('avatars', null, {});
    
  }
};