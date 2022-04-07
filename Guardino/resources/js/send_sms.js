
const client = require('twilio')('ACe0066d7fe8e4e129d320d77a991d0237', '5170db6740df41b9b1d4ae6c57fbbd9d');

client.messages
  .create({
     body: 'Flora.io plant alert!',
     from: '+15078794673',
     to: '+12269270901'
   })
  .then(message => console.log(message.sid));