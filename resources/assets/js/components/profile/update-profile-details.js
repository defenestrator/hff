// Import this component
import trumbowyg from 'vue-trumbowyg';

// Import editor css
import 'trumbowyg/dist/ui/trumbowyg.css';

import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);

Vue.component('update-profile-details', {
    props: ['user'],
    components: {
        trumbowyg
    },
    data() {
        return {
            form: new SparkForm({
                bio: ''
            }),
            trumbowygConfig: {
                id: 'trumbowyg',
                autogrowOnEnter: true,
                btnsDef: {
                    // Customizables dropdowns
                    image: {
                        dropdown: ['insertImage', 'upload'],
                        ico: 'insertImage'
                    }
                },
                btns: [
                    ['viewHTML'],
                    ['formatting'],
                    ['strong', 'em', 'underline'],
                    ['link'],
                    ['image'],
                    ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                    ['unorderedList', 'orderedList'],
                    ['horizontalRule'],
                    ['removeformat']
                ],
                plugins: {
                    upload: {
                        serverPath: '/cms/posts/images',
                        fileFieldName: 'image',
                        urlPropertyName: 'large',
                        headers: {
                            'X-CSRF-TOKEN': Spark.csrfToken
                        },
                        xhrFields: {}
                    },
                }
            }
        };
    },

    mounted() {
        this.form.bio = this.user.bio;
    },

    methods: {
        update() {
            Spark.put('/settings/profile/details', this.form)
                .then(response => {
                    Bus.$emit('updateUser');
                });
        }
    }
});