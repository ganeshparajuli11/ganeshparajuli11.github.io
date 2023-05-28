myFunction1("Northampton")

document.getElementById("search-button").addEventListener("click",myFunction);
// myFunction()
function myFunction(){
    let searc=document.getElementById("search-box").value;//Northampton
    myFunction1(searc)//argument
}

function myFunction1(search){//parameter
    console.log(search.toLowerCase())
    store=localStorage.getItem(search.toLowerCase())

    let currentDate = new Date().toJSON().slice(0, 10);
    const weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    const d = new Date();
    let day = weekday[d.getDay()];
    
    document.getElementById("date").innerHTML=day+", "+currentDate
    if(store){
        console.log("local storage")
        st=JSON.parse(store)
        console.log("exist")
        document.getElementsByClassName("degree")[0].innerHTML=st[0]+"°C";
        document.getElementsByClassName("windy")[0].innerHTML=st[2]+"m/s";
        document.getElementsByClassName("humidity")[0].innerHTML=st[1]+"%";
        document.getElementsByClassName("address")[0].innerHTML='<i class="fa-solid fa-location-dot"></i>  '+st[3]+","+" "+st[4];
        document.getElementsByClassName("cloud")[0].innerHTML=st[5];
        document.getElementsByClassName("image")[0].src="https://openweathermap.org/img/wn/"+st[6]+".png";
        
       
        document.getElementById("rain").innerHTML="Rain: "+"NAN";
    }else{
        console.log("api")
        offline=[]
        fetch('https://api.openweathermap.org/data/2.5/weather?q='+search+'&units=metric&appid=f50b0d3e4b04eb72034b7806fefa48f2')
        .then(response=>response.json())
        .then(data=>{
            console.log(data)
            let temp=data["main"]["temp"]
            offline.push(temp)
           
            let humidity=data["main"]["humidity"]
            offline.push(humidity)
            let wind=data["wind"]["speed"]
            offline.push(wind)
            let name=data["name"]
            offline.push(name)
            let country=data["sys"]["country"]
            offline.push(country)
            let cloud=data["weather"][0]["description"]
            offline.push(cloud)
            let iconValue=data["weather"][0]["icon"]
            offline.push(iconValue)
            localStorage.setItem(search.toLowerCase(),JSON.stringify(offline));
            let rain = data["rain"] ? data["rain"]["1h"] : "N/A";
            console.log(offline)
           
            
            document.getElementsByClassName("degree")[0].innerHTML=temp+"°C";
            document.getElementsByClassName("windy")[0].innerHTML=wind+"m/s";
            document.getElementsByClassName("humidity")[0].innerHTML=humidity+"%";
            document.getElementsByClassName("address")[0].innerHTML='<i class="fa-solid fa-location-dot"></i>  '+name+","+" "+country;
            document.getElementsByClassName("cloud")[0].innerHTML=cloud;
            document.getElementsByClassName("image")[0].src="https://openweathermap.org/img/wn/"+iconValue+".png";
            
           
            document.getElementById("rain").innerHTML="Rain: "+rain+"mm";
            
            
        })
        .catch(error=>{document.getElementById("rain").innerHTML="N/A"
        alert("wrong city or no internet")
    })
}
}
