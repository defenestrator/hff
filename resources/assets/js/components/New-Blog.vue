<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">New Blog Post</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <div class="col-md-12">
                                <input class="form-control" type="text" placeholder="Post Title" size="140" style="width:100%">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <editor></editor>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <button class="btn btn-primary">
                                        Save Draft
                                    </button>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-warning">
                                        Publish
                                    </button>
                                </div>
                                <div class="col-md-2 col-md-offset-6">
                                    <button class="btn btn-danger">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Recent posts</div>
                    <div class="panel-body">
                        I'm an example sidebar
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
