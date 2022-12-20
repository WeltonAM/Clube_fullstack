'use strict';
/** @type {import('sequelize-cli').Migration} */
module.exports = {
  async up(queryInterface, Sequelize) {
    await queryInterface.createTable('avatars', {
      id: {
        allowNull: false,
        autoIncrement: true,
        primaryKey: true,
        type: Sequelize.INTEGER
      },
      path: {
        type: Sequelize.STRING
      },
      userId: {
        type: Sequelize.INTEGER,
        references: {
          model: 'users',
          key: 'id'
        },
        onDelete: 'CASCADE'
      },
      createdAt: {
        allowNull: false,
        defaultValue: Sequelize.literal("CURRENT_TIMESTAMP"),
        type: 'TIMESTAMP',
      },
      updatedAt: {
        allowNull: false,
        defaultValue: Sequelize.literal("CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"),
        type: 'TIMESTAMP',
      }
    });
  },
  async down(queryInterface, Sequelize) {
    await queryInterface.dropTable('avatars');
  }
};