const {createPool} = require('mysql')

const pool = createPool({
    host: 'localhost',
    user: 'root',
    password: 'mysql',
    connectionLimit: 10,
})

pool.query(`select * from fishfarm.users where id = 1`, (err, res)=>{
    return console.log(res)
})