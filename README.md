# task1-web
# Teachable Machine Image Detection Project

## Overview
This project integrates a **Teachable Machine** image classification model with a webpage that utilizes a webcam for real-time object detection. The project includes a counter that tracks the total number of detections based on the predictions made by the model. The counter is stored in a **MySQL** database and can be reset via a button on the webpage.

## Features
1. **Webpage for Teachable Machine Deployment**: A webpage that displays the webcam feed and processes images using a trained **Teachable Machine** model.
2. **Detection Trigger**: Each time an object is detected by the model with a probability above 85%, the detection triggers a counter update.
3. **Database Counter for Total Detections**: The detection counter is stored in a **MySQL** database, and it keeps track of the total number of successful detections.
4. **Counter Display on Webpage**: The total number of detections is displayed on the webpage, which updates dynamically as detections occur.
5. **Reset Button**: A button to reset the detection counter back to zero.

## Technologies Used
- **TensorFlow.js**: For loading and using the Teachable Machine model in the browser.
- **Teachable Machine**: A Google tool to create machine learning models for image, sound, or pose data.
- **PHP**: For handling requests to update and reset the detection counter in the database.
- **MySQL**: For storing the detection count.
- **HTML/CSS/JavaScript**: For creating the frontend user interface.

## Installation

### Frontend (HTML, JavaScript, CSS)
1. Clone or download this repository.
2. Open `index.html` in a web browser that supports JavaScript and webcam access.
   
### Backend (PHP and MySQL)
1. Set up a local server using **XAMPP** or a similar server software.
2. Place the `counter.php` file in the server’s root directory.
3. Create a **MySQL** database named `your_database` and a table named `detection_counter` with the following structure:
   ```sql
   CREATE TABLE detection_counter (
       id INT PRIMARY KEY,
       count INT
   );
   Set the initial value for the detection counter:

sql


INSERT INTO detection_counter (id, count) VALUES (1, 0);
Make sure the database connection settings in the counter.php file are correct.

Dependencies
TensorFlow.js: Included via CDN.
Teachable Machine Image Model: Included via CDN.


## Usage

1. Click the **Start Detection** button to begin detecting objects using the webcam.
2. The **Teachable Machine** model will classify objects and display the classification result on the webpage.
3. Every time a class is detected with a probability greater than 85%, the detection counter will be updated in the database.
4. The detection counter will be displayed on the webpage and automatically updated after each detection.
5. Press the **Reset Counter** button to reset the counter to zero.

