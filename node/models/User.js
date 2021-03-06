/**
 * Created by jedi on 2017-04-20
 */

'use strict';

function User(user) {

    user = user || {};
    if (!(this instanceof User)) {
        return new User(user);
    }
    this.userId      = user.userId      || null;
    this.isValid     = user.isValid     || null;
    this.nickname    = user.nickname    || null;
    this.userName    = user.userName    || null;
    this.firstName   = user.firstName   || null;
    this.lastName    = user.lastName    || null;
    this.photo       = user.photo       || null;
    this.isAdmin     = user.isAdmin     || null;
    this.statusId    = user.statusId    || null;
    this.isOnline    = user.isOnline    || null;
    this.sockets     = {};
    this.tokens      = {};
    this.chatRooms = new Map();
}

User.prototype.addSocket = function (socketId) {
    if (!socketId) {
        return;
    }
    if (!this.sockets.hasOwnProperty(socketId)) this.sockets[socketId] = null;
};

User.prototype.addToken = function (token) {
    if (!token) return ;
    if (!this.tokens.hasOwnProperty(token)) this.tokens[token] = null;
};

User.prototype.getLimited = function () {
    return {
        personId: this.personId,
        firstName: this.firstName,
        lastName: this.lastName
    }
};

User.prototype.addChat = function (chatId) {
    if (!this.chatRooms.has(chatId)) {
        this.chatRooms.set(chatId, null);
    }
};

User.prototype.removeChat = function (chatId) {
    if (this.chatRooms.has(chatId)) {
        this.chatRooms.delete(chatId);
    }
};

User.prototype.canTakeMore = function () {
    return this.chatRooms.size < 5;
};

module.exports = User;
