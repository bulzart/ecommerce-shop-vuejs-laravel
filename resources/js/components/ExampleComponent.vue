<template>
<div class="text-center">

 
  


<div  class="py-1 px-2 d-flex justify-content-center">

<ul class="list-inline">
<li class="list-inline-item"> <input type="text" v-on:keyup.enter="search" v-model="emri" placeholder="Search there..." size="50" class="form-control"></li>
<li class="list-inline-item"><select class="form-control">
     <option value="0">All</option>
      <option v-for="category in categories" :value="category.id">{{category.modeli}}</option>
          </select></li>
  <li class="list-inline-item"><div style="margin-top: 8px; cursor: pointer;"><i @click.prevent="searchs()" style="color: #0041C2;" class="fas fa-search mx-2"></i></div></li>
  </ul>
  </div>
<nav class="navbar navbar-expand-lg navbar-light sticky-top text-center d-flex justify-content-end" style="background: #306EFF;" data-toggle="collapse" data-target=".navbar-collapse">
  <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContents" aria-controls="navbarSupportedContents" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center d-flex justify-content-center" id="navbarSupportedContents">
    <ul class="navbar-nav nav mr-auto">

       
        
        <li v-for="category in categories" class="dropdown">
          <button class="btn" type="button" style="font-size: 15px; color: #FFFFFF" :id="category.id" data-bs-toggle="dropdown" aria-expanded="false">
    {{category.modeli.toUpperCase()}}
  </button>
  
     <ul class="dropdown-menu" :aria-labelledby="category.id">
       <div class="col-md-12 col-sm-12 col-lg-12 col-12 row">
              <div v-for="subcategory in subcategories" v-if="subcategory.car_models_id == category.id" class="col-md-3 col-lg-3 col-sm-12 col-xs-6 col-12">
                  <a :href="'category?q=' + subcategory.name" class="dropdown-item" style="color: #306EFF; font-size: 14px;">{{subcategory.name.toUpperCase()}}</a>
               </div>
             
        </div>
     
      </ul>
      </li>
      


 

    </ul>

  </div>


</nav>
   <div class="row mt-2 container-fluid">
 <div class="col-md-12 col-12 col-lg-3 col-xs-12 mt-1">
   <ul class="col-md-12 col-xs-12 row" id="ulist">
     <li v-for="subcategory in randomcat" class="d-flex justify-content-center col-md-12 col-xs-12"><a :href="'category?q=' + subcategory.name" style="color: #585858; font-size: 16px;"><i class="fas fa-angle-double-right" style="color: #42C0FB;"></i>{{subcategory.name.toUpperCase()}}</a><hr></li>
     </ul>
     

   </div>
     <div class="col-md-6 col-12 col-lg-6 col-xs-12 text-center d-flex justify-content-center">
<img src="images/ecommerce.png">
       </div>
       <div class="col-md-6 col-12 col-lg-3 col-xs-12">
<a :href="signup"><div class="row col-12 col-md-12 col-lg-12" id="signup">
<div class="col-md-6 col-6 col-lg-6 mt-2">
  <b><span>New to our shop?</span></b><br><p>Register now</p>
  </div>
  <div class="col-md-6 col-6 col-lg-6">
  <img src="images/deals.webp" width="96" height="128">
  </div>
  </div>
  </a>
  <a href="#productsection"><div class="row col-12 col-md-12 col-lg-12 mt-2" id="signup">
<div class="col-md-6 col-6 col-lg-6 mt-2">
  <b><span>Fast delivery</span></b><br><p>Get the order in a soon time.</p>
  </div>
  <div class="col-md-6 col-6 col-lg-6">
  <img src="images/delivery.webp" width="96" height="128">
  </div>
  </div>
  </a>
   <div class="row col-12 col-md-12 col-lg-12 mt-2" id="signup">
<div class="col-md-6 col-6 col-lg-6 mt-2">
  <b><span>Support 24/7</span></b><br><p>Get in touch with us anytime.</p>
  </div>
  <div class="col-md-6 col-6 col-lg-6">
  <img src="images/talk.webp" width="96" height="128" style="cursor: pointer;">
  </div>
  </div>

  </div>

     </div>
 <div class="container" id="productsection">
  <br><br>
<div id="insert" class="sticky-top pt-2" >
</div>   
<div class="text-center py-3 px-3 mb-1">
  <h3 class="h3" style="color: rgb(255,127,80)">Shop now!</h3>
</div>
<hr>
<div class="row">
    <div class="col-md-3 col-xs-4 col-sm-4 col-12 col-lg-2 col-xl-2 mb-2" id="filter">
      
    <div class="mt-2"><label for="customRange3" class="form-label">Price range <input v-on:keyup.enter="thisx($event)" @change="thisx($event)" type="text" size="5" id="rangeval" name="rangeval" class="form-control" v-bind:value="x" ></label>
<input type="range"  class="form-range" min="0" max="5000" @change="onRange($event)" step="0.1" v-bind:value="x" id="customRange3"></div>
     <label>Category</label>
      <select name="model" id="model" class="form-control" @change="onChange($event)">
        <option v-for="category in categories" v-bind:value="category.id">{{category.modeli}}</option>
      </select>

    
     <button @click.prevent="search()" class="btn btn-primary mt-2">Filter</button>
      </div>
  <div class="col-md-9 col-xs-8 col-sm-8 col-12 col-lg-10 col-xl-10">
  <div v-if="searched == false">
   <div class="page-content" >
    <div class="products mb-3">
         <div class="row d-flex justify-content-center text-center">
       <div v-for="pr in products" class="mb-2 col-6 col-md-3 col-lg-3 mx-2">
      <div class="product product-7 text-center">
                                            <figure class="product-media">
                                            
                                                <a :href="pr.slug">
                                                    <img :src="pr.path" alt="Product image" class="product-image" id="productimage">
                                                </a>

                                              <!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                   <a @click.prevent="addtocart(pr.id)" class="btn-product btn-cart"><span>add to cart</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                               <!-- End .product-cat -->
                                                <h3 class="product-title"><a :href="pr.slug">{{pr.emri}}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    {{pr.cmimi}} {{curr}}
                                                </div>
                                                <div>
                                                  {{pr.ngjyra}}
                                                  </div>

                                             
                                            </div><!-- End .product-body -->
                                        </div>
           </div>
      </div>
    </div>
         <div class="text-center">
     <nav aria-label="Page navigation example">
       <div >
<ul class="pagination" @click="handleClicks($event)">
    <div v-if="this.page > 2">
      <li class="page-item page-link" style="cursor:pointer;" :value="1">1</li>
    </div>
   <li class="page-item page-link" style="cursor:pointer;" v-if="this.page -1 > 0":value="this.page-1">{{this.page-1}}</li>

 <li class="page-item page-link" style="cursor:pointer;" :value="this.page">{{this.page}}</li>
    <li class="page-item page-link" style="cursor:pointer;" :value="this.page+1">{{this.page+1}}</li>
    
  </ul>
  </div>
</nav>
</div>
     </div>
     </div>
     <div v-if="searched == true">
 <div class="page-content">
    <div class="products mb-3">
         <div class="row justify-content-center">
       <div v-for="pr in products" class="col-6 col-md-3 col-lg-3 mx-2">
      <div class="product product-7 text-center">
                                            <figure class="product-media">
                                            
                                                <a :href="pr.slug">
                                                    <img :src="pr.path" alt="Product image" class="product-image" id="productimage">
                                                </a>

                                              <!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                   <a @click.prevent="addtocart(pr.id)" class="btn-product btn-cart"><span>add to cart</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                               <!-- End .product-cat -->
                                                <h3 class="product-title"><a :href="pr.slug">{{pr.emri}}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    {{pr.cmimi}} {{curr}}
                                                </div>
  <div>
                                                  {{pr.ngjyra}}
                                                  </div>
                                             
                                            </div><!-- End .product-body -->
                                        </div>
           </div>
      </div>
    </div>
     </div>
     </div>
     <div v-if="filtered == true">
       </div>

 </div>
 </div>
    


  </div>


</div>
    
       
 
 
  
</template>

<script>
    export default {

        mounted() {
             axios.get("models")
        .then((response)=> {
          this.categories = response.data;
        });
        this.productss();
     axios.get('isadmin').then(
        (response) => { this.isadmin = response.data;}
      );
       axios.get('curr').then(
        (response) => { this.curr = response.data;}
      );
        axios.get('subcategories').then(
        (response) => { this.subcategories = response.data;}
      );
      axios.get('randomcategories').then(
        (response) => { this.randomcat = response.data;}
      );

   
     
      
        },
        data(){
            return{
                emri: '',
                categories: [],
                selected:'0',
                products: [],
                
                searched: false,
                isadmin: false,
                curr: '',
                page: 1,
                subcategories: [],
                randomcat: [],
                x: 1000,
                filtered: false,
                
            }

        },
        methods:{
          handleClicks(click){
          this.page = click.target.value;
          this.productss();
           
          },
          
          addfalse(){
            this.added = false;
          },
          onRange(event){
          this.x = event.target.value;

          },
          thisx(event){
            document.getElementById('customRange3').value = event.target.value;
            this.x = document.getElementById('rangeval').value;
          },
         
onChange(event){
    this.selected = event.target.value
},
productss(){
 axios.get("indexdata?page=" + this.page).then
        ((response) => {
            this.products = response.data.data;
        });
},

search(){
var val = document.getElementById('rangeval').value;
     axios.get("searchproduct?name=" + this.emri + "&model=" + this.selected + '&price=' + val)
    .then((response)=> {this.products = response.data});
    this.searched = true;
},
searchs(){
     axios.get("searchproduct?name=" + this.emri + "&model=" + this.selected + '&price=' + 999999.99)
    .then((response)=> {this.products = response.data});
    this.searched = true;
},
addtocart(id){
axios.get("add/" + id);
$("#insert").empty();
           $("#insert").append('<div class="alert alert-success alert-dismissible fade show mt-2 mb-2" role="alert">Product was added to cart successfully!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>');
},

        }
    }
</script>
