<template>
<div class="text-center">

  <div class="container">

  <div clas="row">
      <div class="py-1 px-2 d-inline-flex">
  <input type="text" v-on:keyup.enter="search" v-model="emri" placeholder="Search for your phone" size="50" class="form-control col-md-8 col-xs-12 col-sm-8 col-lg-8 col-xl-8">
  <select class="form-control col-3 col-sm-3 col-xs-12 col-md-3 col-xl-3 col-lg" @change="onChange($event)">
      <option value="0">All</option>
      <option v-for="category in categories" :value="category.id">{{category.modeli}}</option>
          </select>
          <div style="margin-top: 8px; cursor: pointer;"><i @click.prevent="search()" class="fas fa-search mx-2"></i></div>
  </div>
  </div>
  </div>
   <div class="d-flex justify-content-center text-center">
     <img src="images/u21a.png" style="cursor: pointer;">
     </div>
 <div class="container">
  <br><br>
<div id="insert" class="sticky-top pt-2">
</div>   

  <div v-if="this.searched == false">
   <div class="page-content">
    <div class="products mb-3">
         <div class="row d-flex justify-content-center text-center">
       <div v-for="pr in products" class="mb-2 col-6 col-md-3 col-lg-3 mx-2">
      <div class="product product-7 text-center">
                                            <figure class="product-media">
                                            
                                                <a :href="pr.slug">
                                                    <img :src="pr.path" alt="Product image" class="product-image">
                                                </a>

                                              <!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                   <button @click.prevent="addtocart(pr.id)" class="btn-product btn-cart"><span>add to cart</span></button>
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
    <div v-if="this.page > 1">
      <li class="page-item page-link" style="cursor:pointer;" :value="1">1</li>
    </div>
   <li class="page-item page-link" style="cursor:pointer;" :value="this.page">{{this.page}}</li>
 <li class="page-item page-link" style="cursor:pointer;" :value="this.page+1">{{this.page+1}}</li>
    <li class="page-item page-link" style="cursor:pointer;" :value="this.page+2">{{this.page+2}}</li>
    
  </ul>
  </div>
</nav>
</div>
     </div>
     </div>
     <div v-if="this.searched == true">
 <div class="page-content">
    <div class="products mb-3">
         <div class="row justify-content-center">
       <div v-for="pr in products" class="col-6 col-md-3 col-lg-3 mx-2">
      <div class="product product-7 text-center">
                                            <figure class="product-media">
                                            
                                                <a :href="pr.slug">
                                                    <img :src="pr.path" alt="Product image" class="product-image">
                                                </a>

                                              <!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                   <button @click.prevent="addtocart(pr.id)" class="btn-product btn-cart"><span>add to cart</span></button>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                               <!-- End .product-cat -->
                                                <h3 class="product-title"><a :href="pr.slug">{{pr.emri}}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    {{pr.cmimi}} {{curr}}
                                                </div>

                                             
                                            </div><!-- End .product-body -->
                                        </div>
           </div>
      </div>
    </div>
     </div>
     </div>


    


  </div>

</div>
     
 
 
  
</template>

<script>
    export default {

        mounted() {
             axios.get(this.url + "models")
        .then((response)=> {
          this.categories = response.data;
        });
        this.productss();
     axios.get(this.url + 'isadmin').then(
        (response) => { this.isadmin = response.data;}
      );
       axios.get(this.url + 'curr').then(
        (response) => { this.curr = response.data;}
      );

        
        
      
        },
        data(){
            return{
                emri: '',
                categories: [],
                selected:'0',
                products: [],
                url: 'http://localhost/ecom/public/',
                searched: false,
                isadmin: false,
                curr: '',
                page: 1
                
                
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
onChange(event){
    this.selected = event.target.value
},
productss(){
 axios.get(this.url + "indexdata?page=" + this.page).then
        ((response) => {
            this.products = response.data.data;
        });
},

search(){

     axios.get(this.url + "searchproduct?name=" + this.emri + "&model=" + this.selected)
    .then((response)=> {this.products = response.data});
    this.searched = true;
},

addtocart(id){
axios.get(this.url + "add/" + id);
$("#insert").empty();
           $("#insert").append('<div class="alert alert-success alert-dismissible fade show mt-2 mb-2" role="alert">Product was added to cart successfully!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>');
}
        }
    }
</script>
