<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../resources/jquery-3.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        main {
            width: 500px;
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        input {
            margin: 20px auto;
            padding: 10px;
            font-size: 17px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 300px;
            max-width: 100%;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 17px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        span {
            font-weight: bold;
        }
        img {
            margin-top: 20px;
            max-width: 100%;
        }
    </style>
    <title>Weather</title>
</head>
<body>
    <main align="center">
        <h1>Weather App</h1>
        <input placeholder='Enter location'>
        <button>Search</button>
        <h1 id='location'></h1>
        Temperature: <span id='temp'></span><br><br>
        Humidity: <span id='humid'></span><br><br>
        Weather: <span id='condition'></span><br><br>
        Wind: <span id='wind'></span><br><br>
        Pressure: <span id='pressure'></span><br>
        <img>
    </main>
    <script>
        $('button').click(async function() {
            const val = $('input').val()
            const response = await fetch(`https://api.weatherapi.com/v1/current.json?q=${val}&key=df1745f8c6cc4466bf545635232304`)
            if (!response.ok) {
                alert(response.status)
                return
            }
            const data = await response.json()

            $('#location').text(`${data.location.name}, ${data.location.region}, ${data.location.country}`)
            $('#temp').text(`${data.current.temp_c}°C`)
            $('#humid').text(`${data.current.humidity}%`)
            $('#condition').text(`${data.current.condition.text}`)
            $('#wind').text(`${data.current.wind_kph} Kmph / ${data.current.wind_mph} mph (${data.current.wind_degree}° - ${data.current.wind_dir})`)
            $('#pressure').text(`${data.current.pressure_mb} hPa`)
            $('img').attr('src', data.current.condition.icon)
        })
    </script>
</body>

</html>