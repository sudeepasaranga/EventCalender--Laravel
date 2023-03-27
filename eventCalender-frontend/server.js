const express = require('express');
const app = express();
const path = require('path');
const axios = require('axios');
const cors = require('cors');

app.use(cors()); // allow cross-origin requests

app.use(express.static('public'));
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// set the view engine to ejs
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));

app.get('/', (req, res) => {
  res.render('home.ejs');
});

app.get('/login', (req, res) => {
  res.render('login.ejs');
});

// Handle the login form submission
app.post('/login', async (req, res) => {
  const email = req.body.email;
  const password = req.body.password;

  try {
    const response = await axios.post('http://127.0.0.1:8000/api/login', {
      email: email,
      password: password,
    });

    res.redirect('/events'); // Redirect to events page
  } catch (error) {
    const errorMessage = error.response.data.message;
    res.render('login', { error: errorMessage }); // Render login page with error message
  }
});

// Route to retrieve all events
app.get('/events', async (req, res) => {
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/events');
    const events = response.data;
    res.render('events.ejs', { events });
  } catch (error) {
    console.error(error);
    res.sendStatus(500);
  }
});

// Route to create a new event
app.post('/events', async (req, res) => {
  try {
    const { title, description, start_date, end_date } = req.body;
    await axios.post('http://localhost:3000/events', { title, description, start_date, end_date });
    res.sendStatus(200);
  } catch (error) {
    console.error(error);
    res.sendStatus(500);
  }
});

const PORT = process.env.PORT || 3000;

app.listen(PORT, () => {
  console.log(`Server listening on port ${PORT}`);
});

