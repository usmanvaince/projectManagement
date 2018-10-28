
<template>
    <div class="page">
        <template>
            <b-table empty-show
                     class="mb-2"
                     striped
                     hover
                     :busy.sync="isBusy"
                     :items="myProvider"
                     :fields="fields"
                     ref="table"
                     caption-top>
                <template slot="table-caption">
                    All Projects
                    <b-button variant="success"
                              v-b-modal.createProject
                              class="float-right">
                        Add New Project
                    </b-button>
                </template>
                <template slot="id" slot-scope="row">
                    <b-button size="sm" variant="primary">
                        View Project
                    </b-button>
                            |
                    <b-button size="sm" variant="danger" @click="deleteProject(row.item.id)">
                         Delete Project
                    </b-button>

                </template>
            </b-table>

            <b-modal id="createProject" size="lg" title="Bootstrap-Vue">

                <b-form id="projectForm" @submit="onSubmit" @reset="onReset" v-if="show">

                    <b-row>

                        <b-col sm="6">
                            <b-form-group label="Project Name:">
                                <b-form-input type="text"
                                              v-model="form.project_name"
                                              name="project_name"
                                              required
                                              placeholder="Enter Project Name"
                                              :description="error"
                                >
                                </b-form-input>

                            </b-form-group>
                        </b-col>

                        <b-col sm="6">
                            <b-form-group label="Client Name:">
                                <b-form-input type="text"
                                              v-model="form.client_name"
                                              name="client_name"
                                              required
                                              placeholder="Enter Client Name"
                                >
                                </b-form-input>

                            </b-form-group>
                        </b-col>

                        <b-col sm="6">
                            <b-form-group label="Manager Name:">
                                <b-form-input type="text"
                                              v-model="form.manager_name"
                                              name="manager_name"
                                              required
                                              placeholder="Enter Manager Name">
                                </b-form-input>
                            </b-form-group>
                        </b-col>

                        <b-col sm="6">
                            <b-form-group label="Project Budget:">
                                <b-form-input type="number"
                                              v-model="form.budget"
                                              name="budget"
                                              required
                                              placeholder="Enter Project Project">
                                </b-form-input>
                            </b-form-group>
                        </b-col>

                        <b-col sm="6">
                            <b-form-group label="Project Category">
                                <b-form-select :options="category"
                                               name="category"
                                               required
                                               v-model="form.category">
                                </b-form-select>
                            </b-form-group>
                        </b-col>

                        <b-col sm="12">
                            <b-form-group label="Project Description:">
                                <b-form-textarea v-model="form.project_description"
                                                 required
                                                 name="project_description"
                                                 placeholder="Enter Project Description">
                                </b-form-textarea>
                            </b-form-group>
                        </b-col>

                        <b-col sm="6">
                            <b-form-group>
                                <b-form-group label="Project Status">
                                    <b-form-radio-group name="status" v-model="form.project_status" >
                                        <b-form-radio value="active">Active</b-form-radio>
                                        <b-form-radio value="inactive">InActive</b-form-radio>
                                    </b-form-radio-group>
                                </b-form-group>
                            </b-form-group>
                        </b-col>

                    </b-row>


                    <b-button type="submit" variant="primary">Submit</b-button>
                    <b-button type="reset" variant="danger">Reset</b-button>
                </b-form>

            </b-modal>

        </template>
    </div>
</template>

<script>


    export default {
        data() {
            return  {
                fields: [
                             {key:'project_name',label: 'Project Title'},
                             {key: 'client_name' ,label:'Client Name'},
                             {key: 'budget',label: 'Budget'},
                             {key: 'category', label :'Category'},
                             {key: 'start_date', label : 'Start Date'},
                             {key: 'end_date', label :'End Date'},
                             {key: 'id',label: 'Actions'  },
                         ],
                form: {
                    project_name: '',
                    project_description: '',
                    client_name: '',
                    manager_name:'',
                    budget: 0,
                    category: null,
                    status: 'active'
                },
                error: '',
                form_type: 'add',
                category: [
                    { text: 'Select One', value: null },
                    'Carrots', 'Beans', 'Tomatoes', 'Corn'
                ],
                show: true,
                isBusy: false
            }
        },
        mounted() {},
        methods: {
            myProvider (ctx) {
                let promise = axios.get('/api/projects');
                return promise.then((response) => {
                    const items = response.data;
                    return(items);
                }).catch(error => {
                    return []
                })
            },
            onSubmit (evt) {
                evt.preventDefault();
                let self = this;
                let form = document.getElementById('projectForm');
                const form_data = new FormData(form);
                axios.post('/api/create_project', form_data).then(function (response) {
                    self.$toaster.success(response.data.message);
                    self.$refs.table.refresh();
                })
                .catch(function (error) {
                    self.$toaster.error('There is some error')
                });
            },
            onReset (evt) {
                evt.preventDefault();
                /* Reset our form values */
                this.form.email = '';
                this.form.name = '';
                this.form.food = null;
                this.form.checked = [];
                this.show = false;
                this.$nextTick(() => { this.show = true });
            },
            deleteProject(project_id) {
              const self = this;
              self.$dialog.confirm('Please confirm to continue').then(function (dialog) {
                        axios.delete('/api/delete/project?id='+project_id, {
                        }).then(function (response) {
                            self.$toaster.success(response.data.message);
                            self.$refs.table.refresh();
                        }.bind(this)).catch(function(error) {
                            self.$toaster.error('There is some error');
                        });
                    }).catch(function () {
                        console.log('Clicked on cancel')
                    });

            },
            validateProjectName() {
                axios.put('/api/validate/project_name', {
                    project_name : this.form.project_name
                })
                .then(function (response) {
                    this.error = response.data.message;
                }.bind(this))
                .catch(function (error) {
                    console.log(error)
                });
            }
        },
        watch: {
           'project_name' : function (value) {
              if (this.form_type === 'add') {
                  this.validateProjectName();
              }
           }
          }
    }
</script>
