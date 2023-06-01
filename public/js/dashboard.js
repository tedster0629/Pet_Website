// Toggling the sidebar menu
$(document).ready(function () {
  $("#sideBarCollapse").on("click", function () {
    $("#sidebar").toggleClass("active");
  });
});


// No of users according to province graph
let provinces=[]
let count=[]
console.log(province_chart)
province_chart.forEach((element)=>{
  if(element.province==null){
    provinces.push("Not Defined")
    count.push(element.count)
  }else{
    provinces.push(element.province)
    count.push(element.count)
  }
})

const usersData = {
  labels:provinces ,
  datasets: [
    {
      label: "Number of users registered by province",
      backgroundColor: [
        "rgba(255, 99, 132, 0.2)",
        "rgba(255, 159, 64, 0.2)",
        "rgba(255, 205, 86, 0.2)",
        "rgba(75, 192, 192, 0.2)",
        "rgba(54, 162, 235, 0.2)",
        "rgba(153, 102, 255, 0.2)",
        "rgba(34, 47, 62, 0.2)",
        "rgba(33, 140, 116, 0.2)",
        "rgba(201, 203, 207, 0.4)",
      ],
      borderColor: [
        "rgb(255, 99, 132)",
        "rgb(255, 159, 64)",
        "rgb(255, 205, 86)",
        "rgb(75, 192, 192)",
        "rgb(54, 162, 235)",
        "rgb(153, 102, 255)",
        "rgb(34, 47, 62)",
        "rgb(33, 140, 116)",
        "rgb(201, 203, 207)",
      ],
      borderWidth: 1,
      data: count,
    },
  ],
};

const config1 = {
  type: "bar",
  data: usersData,
  options: {
    plugins: {
      legend: {
        display: false,
      },
      title: {
        display: true,
        text: "Number of users according to province",
        font: {
          size: 16,
        },
      },
    },
  },
};

const barChart = new Chart(document.getElementById("chart1"), config1);

// No. of pets according to animal type
let pets=[]
let pet_count=[]
pets_chart.forEach((element)=>{
  pets.push(element.animal_type)
  pet_count.push(element.count)
})

const petData = {
  labels: pets,
  datasets: [
    {
      label: "",
      data: pet_count,
      backgroundColor: [
        "rgba(255, 99, 132, 0.8)",
        "rgba(255, 159, 64, 0.8)",
        "rgba(255, 205, 86, 0.8)",
        "rgba(75, 192, 192, 0.8)",
        "rgba(54, 162, 235, 0.8)",
      ],
      hoverOffset: 4,
    },
  ],
};

const config2 = {
  type: "polarArea",
  data: petData,
  options: {
    plugins: {
      title: {
        display: true,
        text: "Number of pets according to animal type",
        font: {
          size: 16,
        },
      },
    },
  },
};

const doughnutChart = new Chart(document.getElementById("chart2"), config2);

// Adopted/Not Adopted
let adoptedPet=0
let nonAdoptedPet=0

for(i=0;i<is_adopted.length;i++){
    if(is_adopted[i]==1){
      adoptedPet=adoptedPet+1;
    }
    else if(is_adopted[i]==0){
      nonAdoptedPet=nonAdoptedPet+1;
    }
}

const adoptedData = {
  labels: ["Adopted", "Not Adopted"],
  datasets: [
    {
      label: "",
      data: [adoptedPet, nonAdoptedPet],
      backgroundColor: ["rgba(255, 99, 132, 0.8)", "rgba(255, 159, 64, 0.8)"],
      hoverOffset: 4,
    },
  ],
};

const config3 = {
  type: "doughnut",
  data: adoptedData,
  options: {
    plugins: {
      title: {
        display: true,
        text: "Adopted Pets v/s Non Adopted Pets",
        font: {
          size: 16,
        },
      },
    },
  },
};

const pieChart = new Chart(document.getElementById("chart3"), config3);

// Pets added according to date
let pets_added_count=[]
let date=[]
pets_added_date.forEach((element)=>{
  pets_added_count.push(element.count)
  date.push(element.date)
})

const petsDataByDate = {
  labels: date,
  datasets: [
    {
      label: "Pets Added",
      data: pets_added_count,
      fill: false,
      borderColor: "rgb(75, 192, 192)",
      tension: 0.1,
    },
  ],
};

const config4 = {
  type: "line",
  data: petsDataByDate,
  options: {
    plugins: {
      title: {
        display: true,
        text: "Number of pets added according to date",
        font: {
          size: 16,
        },
      },
      legend: {
        display: false,
      },
    },
  },
};

const lineChart = new Chart(document.getElementById("chart4"), config4);