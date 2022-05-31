$(document).ready(function(){
    const addTocarts  = document.querySelectorAll('.js-add-product');
    addTocarts.forEach(button=>{
        button.addEventListener('click',function(event){
            const product_id = event.target.dataset.id;
            axios.post(`/pos/carts/add/${product_id}`)
                .then(response=>{
                    const item = response.data.item;
                    addItemToCarts(item);
                })
                .catch(error=>{
                    // alert('product already exist in the cart!!');
                    toastr.success('product already exist in the cart');
                })
            //  removeBtnsInit();
        })
    })

    getItemsFromCarts();
});
function getItemsFromCarts(){
    axios.get('/pos/carts')
         .then(response=>{
             const carts = response.data.carts;
             showItemsIncarts(carts);

         })
         .catch(error=>{
             console.log(error);
         })
}

function increaseButtonInit(){
    const increaseButtons = document.querySelectorAll('.increase');
    increaseButtons.forEach(btn=>{
        btn.addEventListener('click',function(event){
            const product_id = event.target.dataset.id;

            const increase  = "increase";
            axios.post(`/pos/carts/update/${product_id}/1/${increase}`)
                 .then(response=>{
                     const carts = response.data.carts;
                     showItemsIncarts(carts);
                 })
                 .catch(error=>{
                     console.log(error)
                 })
        })
    })
}
function decreaseButtonInit(){
    const decreaseButtons = document.querySelectorAll('.decrease');
    decreaseButtons.forEach(btn=>{
        btn.addEventListener('click',function(event){
            const product_id = event.target.dataset.id;
            const decrease = 'decrease';
            axios.post(`/pos/carts/update/${product_id}/1/${decrease}`)
                 .then(response=>{
                     const carts = response.data.carts;
                     showItemsIncarts(carts);
                 })
        })
    })
}


///you should work here
function showItemsIncarts(carts){
    // console.log(carts);
    const cartScroller = document.querySelector('.cart-scroller');
    const SubTotal     = document.querySelector('#sub-total');
    const totalPrice   = document.querySelector('#total-price');
    const Tax  = document.querySelector('#tax');
    cartScroller.innerHTML = "";
    let total = 0;
    let MainTotal = 0;
    if(!carts){
     return
    }
    carts.forEach(cart=>{
        const [key]   = Object.keys(cart);
        const real_item = cart[key];
        total        += Number(real_item.qty)*Number(real_item.price);
        cartScroller.appendChild(setItemIncart(cart));
    })


    // Tax.value =
    SubTotal.innerText=total;
    SubTotal.value = total;
    MainTotal =total + (SubTotal.value * Tax.innerText)/100;
    totalPrice.innerText  = MainTotal;

    removeBtnsInit();//initialize remove btns;
    increaseButtonInit()
    decreaseButtonInit()
}


function addItemToCarts(item){
    const cartScroller = document.querySelector('.cart-scroller');
    const [key]   = Object.keys(item);
    const real_item = item[key];
    const divNode = document.createElement('div');
    const newItem = `<div class="row align-items-center products cart-items">
      <div class="col-auto w-60px">
      <div class="row align-items-center flex-column">
        <div class="col">
          <div class="row">
          <div class="quantity">
            <a href="#" class="increase" data-id="${real_item.product_id}">+</a>
            <input type="text" id="text" value="${real_item.qty}">
            <a href="#" class="decrease" data-id="${real_item.product_id}">-</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="text-truncate-2">${real_item.product_name}</div>
      <span class="span badge badge-inline badge-soft-secondary">Black</span>
    </div>
    <div class="col-auto">
      <div class="item-price">$ ${real_item.price} x ${real_item.qty}</div>
      <div class="total"><strong>$ ${Number(real_item.price) * Number(real_item.qty)}</strong></div>
    </div>
    <div class="col-auto">
      <button type="button" class="btn btn-circle btn-delete-icon btn-sm ml-2 mr-0 ">
        <i class="fa fa-trash js-remove-product" data-id="${real_item.product_id}"></i>
      </button>
    </div>
    </div>
    `;
    divNode.innerHTML = newItem;
    cartScroller.appendChild(divNode);
    removeBtnsInit();//initialize remove btns;
    increaseButtonInit()
    decreaseButtonInit()
}



function removeBtnsInit(){
    const removebtns = document.querySelectorAll('.js-remove-product');
    if(removebtns){
        removebtns.forEach(btn=>{
            btn.addEventListener('click', function(event){
                const product_id = event.target.dataset.id;
                axios.post(`/pos/carts/remove/${product_id}`)
                    .then(response=>{
                          const carts  = response.data.carts;
                          showItemsIncarts(carts);
                    })
                    .catch(error=>{
                        //  toastr.danger('product Deleted Successfully');
                        console.log(error);
                    })
            })
        });
    }
}
//fahim bhai start work

function setItemIncart(item){
    const [key]   = Object.keys(item);
    const real_item = item[key];
    const divNode = document.createElement('div');
    const newItem = `<div class="row align-items-center products cart-items">
      <div class="col-auto w-60px">
      <div class="row align-items-center flex-column">
        <div class="col">
          <div class="row">
          <div class="quantity">
            <a href="#" class="increase" data-id="${real_item.product_id}">+</a>
            <input type="text" id="text" value="${real_item.qty}">
            <a href="#" class="decrease" data-id="${real_item.product_id}">-</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="text-truncate-2">${real_item.product_name}</div>
      <span class="span badge badge-inline badge-soft-secondary">Black</span>
    </div>
    <div class="col-auto">
      <div class="item-price">$ ${real_item.price} x ${real_item.qty}</div>
      <div class="total"><strong>$ ${Number(real_item.price) * Number(real_item.qty)}</strong></div>
    </div>
    <div class="col-auto">
      <button type="button" class="btn btn-circle btn-delete-icon btn-sm ml-2 mr-0 ">
        <i class="fa fa-trash js-remove-product" data-id="${real_item.product_id}"></i>
      </button>
    </div>
    </div>
    `;
    divNode.innerHTML = newItem;
    return divNode;
}
