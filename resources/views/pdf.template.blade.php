<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PDF Plan Holiday</title>
</head>
<body>
    <h1>{{ planHoliday->name }}</h1>

    <p>{{ planHoliday->description }}</p>

    <span>Date: {{ planHoliday->date }}</span>
    <span>Location: {{ planHoliday->location }}</span>
    <span>Participants: {{ planHoliday->participants }}</span>
</body>
</html>