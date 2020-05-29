var mysql = require('mysql');
var pool = mysql.createPool({
    connectionLimit : 10,
    host            : 'classmysql.engr.oregonstate.edu',
    username        : 'cs340_whitbeyc',
    password        : 'cs340database',
    database        : 'cs340_whitbeyc',
});
module.exports.pool = pool;