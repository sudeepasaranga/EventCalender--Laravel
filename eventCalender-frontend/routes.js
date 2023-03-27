// const express = require('express');
// const router = express.Router();
// const axios = require('axios');

// // Event routes
// // router.get('/home', async (req, res) => {
// //   try {
// //     const response = await axios.get('http://localhost:8000/api/events');
// //     const events = response.data;
// //     res.render('home', { events });
// //   } catch (error) {
// //     console.error(error);
// //     res.status(500).json({ error: 'Internal server error' });
// //   }
// // });



// module.exports = router;






// Authentication routes
// router.post('/login', async (req, res) => {
//     try {
//       const response = await axios.post('http://localhost:8000/login', req.body);
//       res.json(response.data);
//     } catch (error) {
//       console.error(error);
//       res.status(500).json({ error: 'Internal server error' });
//     }
//   });

// router.post('/events', async (req, res) => {
//     try {
//       const response = await axios.post('http://localhost:8000/events', req.body);
//       res.json(response.data);
//     } catch (error) {
//       console.error(error);
//       res.status(500).json({ error: 'Internal server error' });
//     }
//   });
  
//   router.get('/show-event/:id', async (req, res) => {
//     try {
//       const response = await axios.get(`http://localhost:8000/show-event/${req.params.id}`);
//       res.json(response.data);
//     } catch (error) {
//       console.error(error);
//       res.status(500).json({ error: 'Internal server error' });
//     }
//   });
  
//   router.put('/events/:id', async (req, res) => {
//     try {
//       const response = await axios.put(`http://localhost:8000/events/${req.params.id}`, req.body);
//       res.json(response.data);
//     } catch (error) {
//       console.error(error);
//       res.status(500).json({ error: 'Internal server error' });
//     }
//   });
  
//   router.delete('/events/:id', async (req, res) => {
//     try {
//       const response = await axios.delete(`http://localhost:8000/events/${req.params.id}`);
//       res.json(response.data);
//     } catch (error) {
//       console.error(error);
//       res.status(500).json({ error: 'Internal server error' });
//     }
//   });
  
//   router.post('/events/:id/attend', async (req, res) => {
//     try {
//       const response = await axios.post(`http://localhost:8000/events/${req.params.id}/attend`, req.body);
//       res.json(response.data);
//     } catch (error) {
//       console.error(error);
//       res.status(500).json({ error: 'Internal server error' });
//     }
//   });
  
//   router.post('/events/:id/interest', async (req, res) => {
//     try {
//       const response = await axios.post(`http://localhost:8000/events/${req.params.id}/interest`, req.body);
//       res.json(response.data);
//     } catch (error) {
//       console.error(error);
//       res.status(500).json({ error: 'Internal server error' });
//     }
//   });