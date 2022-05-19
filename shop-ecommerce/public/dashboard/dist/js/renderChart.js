//group-product ---> 
const chartGroupProduct = document.getElementById("pieChart");
sum=dataGroupProduct.reduce((total,item,index) => {
    return total+item.Tong
},0)

num=dataGroupProduct.map((item,index)=>{
    return (item.Tong/sum)*100  
})
nameGroupProduct=dataGroupProduct.map((item,index)=>{
    return item.name  
})
console.log(num);
const myChart = new Chart(chartGroupProduct, {
  type: "pie",
  data: {
    labels: nameGroupProduct,
    datasets: [
      {
        label: "Tỷ Lệ Mua Hàng Của Các Loại Sản Phẩm",
        data: num,
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
