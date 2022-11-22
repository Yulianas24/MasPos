<script>

cart = []

window.onload = () => {
  loadData()
  totalBill()
}

const myTimeout = setTimeout(myGreeting, 2000);

function myGreeting() {
  $('#hide').hide()
  console.log('hide')
}

function totalBill() {
  let bill = 0
  cart.forEach(obj => {
        bill += (obj['price'] * obj['inCart']);
    });
    $('#totalBill').html('Total Bill : Rp. '+bill.toLocaleString('en-US'))
}

function getId(id){
  $('#toast').show()
  let selected_prod = products.filter(n => n['id'] == id)
  let cart_filter = cart.filter(n => n['id'] == selected_prod[0].id)
  if(cart_filter == 0){
    console.log("add new")
    selected_prod[0].inCart = 1
    cart.push(selected_prod[0])
  } else {
    console.log("increase inCart")
    cart_filter[0].inCart += 1
  }
  saveData();
  totalBill()
  const myTimeout = setTimeout(function() {
    $('#toast').hide()
  }, 500);
}

</script>