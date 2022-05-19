//group-product ---> 
const chartGroupProduct = document.getElementById("pieChartGroupProduct");
sumGroupProduct=dataGroupProduct.reduce((total,item,index) => {
    return total+item.Tong
},0)

numGroupProduct=dataGroupProduct.map((item,index)=>{
    return ((item.Tong/sumGroupProduct)*100 ).toFixed(2) 
})
nameGroupProduct=dataGroupProduct.map((item,index)=>{
    return item.name  
})
console.log(sumGroupProduct);
const myChartGroupProduct = new Chart(chartGroupProduct, {
  type: "pie",
  data: {
    labels: nameGroupProduct,
    datasets: [
      {
        label: "Tỷ Lệ Mua Hàng Của Các Loại Sản Phẩm",
        data: numGroupProduct,
        backgroundColor: [
          "rgb(255, 99, 132)",
          "rgb(54, 162, 235)",
          "rgb(255, 205, 86)"
        ],
        hoverOffset: 4
      }
    ]
  }
});
// Order-->
console.log( dataChartOrderLongTime);
numberChartOrder=dataChartOrderLongTime.map((item)=>{
  return item.amount_order
})

console.log(numberChartOrder)
const chartStatictisOrder= document.getElementById("areaChartOrder");
const labels = [
  "Tháng 1",
  "Tháng 2",
  "Tháng 3",
  "Tháng 4",
  "Tháng 5",
  "Tháng 6",
  "Tháng 7",

];

const data1 = {
  labels: labels,
  datasets: [
    {
      label: "Số Đơn Hàng: ",
      backgroundColor: "rgb(255, 99, 132)",
      borderColor: "rgb(255, 99, 132)",
      data: numberChartOrder
    }
  ]
};

const config = {
  type: "line",
  data: data1,
  options: {}
};
const myChart = new Chart(chartStatictisOrder, {
  type: "line",
  data: data1,
  options: {}
});
