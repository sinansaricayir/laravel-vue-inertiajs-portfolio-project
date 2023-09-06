<template>
    <section class="flex items-center justify-between px-44 py-6">
        <div class="h-24 w-24 rounded-full border-double border-8" :class="background">

        </div>
        <p p class=" text-2xl font-extrabold text-gray-800 mx-1">
            <slot></slot>
        </p>

    </section>
</template>


<script>
export default {
    props: ['background']
}
</script>
