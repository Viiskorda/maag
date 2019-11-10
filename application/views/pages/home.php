<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
	<a href="https://tigu.hk.tlu.ee/~annemarii.hunt/codeigniter/">Avaleht</a>
        <a href="https://tigu.hk.tlu.ee/~annemarii.hunt/codeigniter/week">Nädalavaade</a>
        <a href="https://tigu.hk.tlu.ee/~annemarii.hunt/codeigniter/fullcalendar">FullCalender</a>
        <!-- <h1><?php #echo $title; ?></h1> -->
      <div class="login d-flex align-items-center py-5">
		  
        <div  id="app" class="container">
			
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <form>
                <div>
                  <label for="areaSelection">Piirkond</label>
                  <select v-for="region in regions" class="form-control" id="areaSelection">
                    <option>{{ region.name }}</option>
                  </select>
                  <tr v-for="region in regions">
                            <!-- <td><input type="checkbox" v-model="row.selected" v-on:click="checkSelectAll"></td> -->
                            <td>{{ region.name}}</td>
                  </tr>
                </div>

                <div>
                  <label for="facility">Asutus</label>
                  <select class="form-control" id="facility">
                    <option>Baas1</option>
                    <option>Baas2</option>
                    <option>Baas3</option>
                    <option>Baas4</option>
                    <option>Baas5</option>
                  </select>
                </div>

                <div>
                  <label for="room">Saal</label>
                  <select class="form-control" id="room">
                    <option>Saal1</option>
                    <option>Saal2</option>
                    <option>Saal3</option>
                    <option>Saal4</option>
                    <option>Saal5</option>
                  </select>
                </div>

                <div>
                <label for="start">Kuupäev</label>
                <input class="form-control" type="date" id="start" min="2018-01-01" max="2021-12-31">
                </div>
                </br>

                <button class="btn btn-lg btn-primary float-right btn-login text-uppercase font-weight-bold mb-2" type="submit">Otsi</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <script src="<?php echo base_url(); ?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vue-router.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/axios.min.js"></script>

<script>
    
        var apiUrl = '<?php echo base_url(); ?>';                
    // Vue.use(VeeValidate);
    var app = new Vue({
        el: '#app',
        data: {
            newItems: {
                selected: false,
                code: '',
                name: ''
            },
            regions: [], // minu lisa
            onEdit: false,
            selectedAll: false,
            delete: [],
            loading: true,
            message: []
        },
        created() {
            this.getRegions() //minu muudatus
        },
        methods: {
            validateBeforeSubmit: function() {
                var vm = this
                this.$validator.validateAll().then(function(isValid) {
                    if(!isValid) return;
                    vm.startLoading()
                    var url = apiUrl+'home/insert'
                    var message = 'Items added successfully'

                    if(vm.onEdit) {
                        url = apiUrl+'home/update/'+vm.onEdit
                        message = 'Items Updated successfully'
                    } 

                    axios.post(url,
                    new FormData($('#itemsForm')[0])).then(function(response) {
                        vm.getRegions() //minu muudatus
                        vm.createNew()
                        vm.showMessage(message)
                        vm.endLoading()                        
                    }).catch(function(e) {
                        
                    })
                });
            },
            getRegions: function() { //minu muudatus
                axios.get(apiUrl+'home/get_regions').then(
                    result => {
                        this.regions = result.data
                        this.endLoading()
                    }
                );
            },
            createNew: function() {               
                this.onEdit = false
                this.newItems = {
                    selected:false,
                    code:'', 
                    name:''
                }
            },
            edit: function(id) {
                this.onEdit = id
                this.startLoading()
                this.newItems = {
                    selected:false,
                    code:'', 
                    name:''
                }
                axios.get(apiUrl+'home/edit/'+id).then(
                    result => {
                        this.newItems.code = result.data.code,
                        this.newItems.name = result.data.name,
                        this.endLoading()
                    }
                );
            },
            checkAll: function() {
                if(this.selectedAll) {
                    this.selectedAll = true;
                    this.rows.forEach(function(row) {
                        row.selected = true
                    })
                } else {
                    this.selectedAll = false;
                    this.rows.forEach(function(row) {
                        row.selected = false
                    })
                }
            },
            checkSelectAll: function() {
                var check = true;
                this.rows.forEach(function (row) {
                    if (row.selected == false) {
                        check = false;
                    } 
                });
                this.selectedAll = check;
            },
            deleteSelected: function() {
                var conf = confirm("Are you sure to delete?");
                if(!conf) return true;
                var vm = this;
                this.startLoading()
                this.rows.forEach(function(row) {
                    if(row.selected) {
                        vm.delete.push({id:row.id})
                    }
                })
                axios.post(apiUrl+'home/delete/',this.delete).then(function(response) {
                        
                    vm.getRows()
                    vm.selectedAll = false
                    vm.createNew()
                    vm.showMessage('Deleted items successfully')
                    vm.endLoading()
                })
                
            },
            startLoading: function() {
                this.loading = true
            },
            endLoading: function() {
                this.loading = false
            },
            showMessage: function(message, status = 'success') {
                this.message = {text:message, status:status}
                this.removeMessage()
            },
            removeMessage: function() {
                var msg = this
                setTimeout(function() {
                    msg.message = {text:'', status:''}
                }, 5000)
            }
        }
    });

    console.log(data.regions);
    </script>