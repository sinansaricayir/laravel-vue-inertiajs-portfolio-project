<script >
import { defineComponent, defineAsyncComponent } from 'vue';
import { Head, Link } from '@inertiajs/vue3'
import JetApplicationMark from '@/Components/ApplicationMark.vue'
import Section from '@/Components/Section.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Skill from '@/Components/Skill.vue';
import Project from '@/Components/Project.vue';
import { BeakerIcon } from '@heroicons/vue/24/solid'
import Modal from '@/Components/Modal.vue';
import InputError from '@/Components/InputError.vue';

export default defineComponent({

    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        skills: Object,
        projects: Object,
        errors: Object,

    },
    components: {
        Head,
        Link,
        JetApplicationMark,
        Section,
        PrimaryButton,
        Skill,
        Project,
        BeakerIcon,
        Modal,
        InputError

    },
    data() {
        return {
            contacting: false,
            name: '',
            email: '',
            message: '',
        }
    },
    methods: {
        submit() {
            //console.log(this.name, this.email, this.message);
            this.$inertia.post('/contact-form', {
                name: this.name,
                email: this.email,
                message: this.message,
            });
        }
    }
})
</script>


<template>
    <Head title="Homepage" />
    <Section class="grid grid-cols-2 text-right bg-gray-800 text-gray-300">
        <div>
            <jet-application-mark class="h-12 w-auto"></jet-application-mark>
        </div>
        <div v-if="canLogin">
            <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm underline">Dashboard</Link>
            <template v-else>
                <Link :href="route('login')" class="text-sm underline">Log in</Link>
                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm underline">Register</Link>
            </template>
        </div>
    </Section>
    <div>
        <Section class="bg-gray-800 pt-16 h-screen">
            <div class="flex flex-col h-2/3">
                <p
                    class="uppercase animate-pulse text-gray-300 border-b border-gray-400 text-2xl font-bold text-center pb-4 shadow-md shadow-gray-400 hover:scale-105 transition-all duration-500">
                    Hey!
                    This is
                    Sinan.
                    I'm a Full
                    Stack Developer and I would be glad to
                    work with
                    you.
                </p>
                <p class="flex items-end h-full text-gray-500">
                    <span class="border-b-2">Want to know more?</span>
                    <primary-button @click="contacting = true"
                        class="ml-4 bg-green-500 text-white p-2 font-bold hover:bg-green-800 mt-2">
                        Get in touch
                    </primary-button>
                </p>
                <div class="text-9xl animate-pulse flex items-center justify-center text-gray-300">
                    <a href="#skills">&#8675;</a>
                </div>
            </div>
        </Section>
        <Section id="skills" class="bg-gray-200 text-gray-800 h-screen">
            <h2 class="pt-6 text-5xl font-bold">Skills</h2>

            <div class="grid grid-cols-2">
                <Skill v-for="skill in skills" :background="skill.color">
                    {{ skill.name }}
                </Skill>
            </div>

            <div class="flex justify-center mt-10">
                <primary-button @click="contacting = true" class="bg-blue-500 text-white p-2 font-bold hover:bg-blue-300">
                    Get in touch
                </primary-button>
            </div>
        </Section>
        <Section class="bg-gray-600 text-gray-200 h-screen">
            <h2 class="pt-6 text-5xl font-bold">Projects</h2>
            <div v-for="(project, index) in projects">
                <Project :color="project.color" :title="project.title" :description="project.description">
                    <BeakerIcon />
                </Project>
            </div>

            <div class="flex items-center justify-center">
                <primary-button @click="contacting = true"
                    class="bg-gray-500 text-white p-2 font-bold hover:bg-gray-100 mt-2">
                    Know More
                </primary-button>
            </div>
        </Section>
        <Section class="flex items-center justify-evenly bg-gray-800 text-gray-300 p-8">
            <p>&copy SSA Technology All Right Reserved</p>
            <div class="flex justify-evenly items-center gap-2">
                <Link href="#">Github</Link>
                <Link href="#">Twitter </Link>
                <Link href="#">Linkedin</Link>
            </div>
        </Section>
    </div>
    <Modal :show="contacting" @close="contacting = false">
        <div class="bg-gray-50 shadow-2xl p-8">
            <p class="text-gray-600 text-2xl font-extrabold text-center">Let me know some details</p>
            <form @submit.prevent="submit">
                <div class="flex flex-col gap-4 mt-4">
                    <label for="name">Name</label>
                    <input type="text" v-model="name" placeholder="Your name"
                        class="border-2 border-gray-300 p-2 rounded-md">
                    <input-error :message="errors.name" />
                </div>
                <div class="flex flex-col gap-4 mt-4">
                    <label for="email">Email</label>
                    <input type="email" v-model="email" placeholder="Your email"
                        class="border-2 border-gray-300 p-2 rounded-md">
                    <input-error :message="errors.email" />

                </div>
                <div class="flex flex-col gap-4 mt-4">
                    <label for="message">Message</label>
                    <textarea v-model="message" placeholder="Your message"
                        class="border-2 border-gray-300 p-2 rounded-md"></textarea>
                    <input-error :message="errors.message" />

                </div>
                <input type="submit" value="Send" class="bg-green-500 text-white p-2 font-bold hover:bg-green-800 mt-2">
            </form>
        </div>
    </Modal>
</template>

