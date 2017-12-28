<update-profile-details :user="user" inline-template>
    <div class="panel panel-default">
        <div class="panel-heading">Public Author Bio:</div>

        <div class="panel-body">
            <!-- Success Message -->
            <div class="alert alert-success" v-if="form.successful">
                Your profile has been updated!
            </div>

            <form class="form-horizontal" role="form">
                <!-- Bio -->
                <div class="form-group" :class="{'has-error': form.errors.has('bio')}">

                    <div class="col-md-12">
                        <trumbowyg id="trumbowyg" :config="trumbowygConfig" name="bio" v-model="form.bio"></trumbowyg>
                        <span class="help-block" v-show="form.errors.has('bio')">
                            @{{ form.errors.get('bio') }}
                        </span>
                    </div>
                </div>

                <!-- Update Button -->
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-6">
                        <button type="submit" class="btn btn-primary"
                                @click.prevent="update"
                                :disabled="form.busy">

                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</update-profile-details>

