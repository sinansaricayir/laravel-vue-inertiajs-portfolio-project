<script >
import { defineComponent } from 'vue';
import { Head, Link } from '@inertiajs/vue3'
import JetApplicationMark from '@/Components/ApplicationMark.vue'
import Section from '@/Components/Section.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue';


export default defineComponent({

    props: {
        canLogin: Boolean,
        canRegister: Boolean,
    },
    components: {
        Head,
        Link,
        JetApplicationMark,
        Section,
        PrimaryButton,
    },
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
                    <primary-button class="ml-4 bg-green-500 text-white p-2 font-bold hover:bg-green-800 mt-2">
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
            <primary-button class="bg-blue-500 text-white p-2 font-bold hover:bg-blue-300">
                Get in touch
            </primary-button>
        </Section>
        <Section class="bg-gray-600 text-gray-200 h-screen">
            <h2 class="pt-6 text-5xl font-bold">Projects</h2>
            <div class="flex items-center justify-center">
                <primary-button class="bg-gray-500 text-white p-2 font-bold hover:bg-gray-100 mt-2">
                    Know More
                </primary-button>
            </div>
        </Section>
        <Section class="flex items-center justify-evenly bg-gray-800 text-gray-300 p-8">
            <p>&copy SSA Technology All Right Reserved</p>
            <div>
                Github
                Twitter
                Linkedin
            </div>
        </Section>
    </div>
</template>

