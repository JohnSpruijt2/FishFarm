const {createPool} = require('mysql')

const pool = createPool({
    host: 'localhost',
    user: 'root',
    password: 'mysql',
    connectionLimit: 10,
})

pool.query(`select name from fishfarm.fish`, (err, res)=>{
    return console.log(res)
})