q = '20.252346,85.802773';

function m() {
fetch('https://api.weatherapi.com/v1/current.json?q='+q+'&key=df1745f8c6cc4466bf545635232304')
  .then(response => response.json())
  .then(data => {
    //console.log(data);
      loc = data.location;
      cur =data.current;
      as();
  })
  .catch(error => {
    alert(error);
    // Handle errors
  });
}

function as() {
   document.querySelector('.s1').innerHTML = loc.name+', '+loc.region+', '+loc.country;
   document.querySelector('.s2').innerHTML = loc.localtime;
   document.querySelector('.s3').innerHTML = cur.last_updated+' / '+time()+' minutes ago';
   document.querySelector('.s4').innerHTML = cur.temp_c+'°C';
   document.querySelector('.s5').innerHTML = cur.condition.text;
   document.querySelector('.s6').innerHTML = cur.feelslike_c+'°C';
   document.querySelector('.s7').innerHTML = cur.wind_kph+' KMPH('+cur.wind_degree+'° -- '+cur.wind_dir+')';
   document.querySelector('.s8').innerHTML = cur.gust_kph+' KHPH';
   document.querySelector('.s9').innerHTML = cur.pressure_mb+' hPa';
   document.querySelector('.s10').innerHTML = cur.humidity+'%';
   document.querySelector('.s11').innerHTML = cur.cloud+'%';
   document.querySelector('.s12').innerHTML = cur.vis_km+' Km';
   document.querySelector('.s13').innerHTML = cur.uv;
   document.querySelector('.s14').innerHTML = cur.precip_mm+' mm';

   icon = cur.condition.icon;
   d3 = document.querySelector('.d3');
   d3.style.background = 'url(http:'+icon+')';
}

function get() {
   q = document.getElementById("txt").value;
   m();
   document.querySelector('#txt').value= '';
}

function time() {
   s = loc.localtime.split(' ')[1].split(':');
   s = s[0] + s[1];
   c = cur.last_updated.split(' ')[1].split(':');
   c = c[0] + c[1];
   d = +s - (+c);
   if (d == 0)
      return 'Now';
   else if (d == 1)
      return d+' minute ago';
   else
      return d+' minutes ago';
m();
  
