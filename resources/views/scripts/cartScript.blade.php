<script>

cart = []
const data_body =  document.getElementById("data_body")
data_body.innerHTML  = ''

window.onload = () => {
  loadData();
  renderData();
}

function totalBill() {
  let bill = 0
  cart.forEach(obj => {
        bill += (obj['price'] * obj['inCart']);
    });
    
    $('#inputBill').val(bill)
    $('#totalText').html('Total Bill : Rp. '+bill.toLocaleString('en-US'))
}

function renderData(){
  totalBill()
  let index = 1
  data_body.innerHTML  = ''
  cart.forEach(element => {
    data_body.append(showData(element, index))
    index +=1
  });
}


function showData(cart, index){
  let image = ('storage/'+cart['image'].toString())
  const row = document.createElement('tr');
  row.class = " text-lg font-semibold";
  row.style.borderBottom = "1px solid #D9D9D9"
  row.innerHTML = 
  `
    <td class="px-6 py-4 whitespace-nowrap text-gray-900">${index}</td>
    <td class="flex items-center px-6 py-4">
      <div class="h-[200px] w-[200px] rounded-md bg-slate-300 mr-3">
        <img class="object-cover h-[200px] w-[200px] rounded-md" src="{{ asset("`+image+`") }}" alt="">
      </div>
      <div>
        <h1>${cart['product_name']}</h1>
        <h1>Rp. ${cart['price'].toLocaleString('en-US')}</h1>
      </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-center">
      <div class="flex justify-center">
          <a class="h-8 w-8 pt-1 bg-[#0052CC] text-white rounded-full mr-3 hover:cursor-pointer" onclick="subCart('${cart['id']}')">-</a>
        ${cart['inCart']}
          <a class="h-8 w-8 pt-1 bg-[#0052CC] text-white rounded-full ml-3 hover:cursor-pointer" onclick="addCart('${cart['id']}')">+</a>
      </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-center">
      Rp. ${(cart['inCart'] * cart['price']).toLocaleString('en-US')}
    </td>
    <td class="text-sm text-gray-900 font-light pl-6 py-4 whitespace-nowrap text-right">
        <a class="btn bg-[#DE350B] hover:bg-[#de350bdb] hover:cursor-pointer"  onclick="deleteItem('${cart['id']}')">Remove Item</a>
    </td> 
  `
  return row;
}

function deleteItem(id) {
  for (const index in cart){
    if (cart[index].id == id){
      cart.splice(index,1)
      saveData()
      renderData()
    }
  }
}
  
function subCart(id) {
  let cart_filter = cart.filter(n => n['id'] == id)[0]
  if(cart_filter['inCart']<= 1){
    console.log('null')
    deleteItem(id)
  } else {
    cart_filter['inCart'] -=1
    saveData()
    renderData()
  }
}

function addCart(id) {
  let cart_filter = cart.filter(n => n['id'] == id)[0]
  cart_filter['inCart'] +=1
  saveData()
  renderData()
}

</script>

    