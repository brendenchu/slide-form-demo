<script lang="ts" setup>
  import { Head, useForm } from '@inertiajs/vue3'
  import PrimaryButton from '@/Components/PrimaryButton.vue'
  import StoryLayout from '@/Layouts/StoryLayout.vue'
  import { LogoutButton } from '@/Components/Story/v1/UI'

  const form = useForm({})
</script>

<template>
  <Head title="Slide Form Demo" />
  <StoryLayout>
    <template #top>
      <div class="p-2 flex justify-between items-start gap-2 bg-base-200">
        <h2 class="text-3xl">Slide Form Demo</h2>
        <div class="flex justify-end items-start gap-2">
          <LogoutButton />
        </div>
      </div>
    </template>
    <section class="stretched">
      <div class="stretched contained centered">
        <div class="prose">
          <p>Welcome to the Slide Form Demo. You will be guided through a multi-step form divided into sections.</p>
          <p>To get started, click the button below.</p>
          <PrimaryButton @click="form.post(route('story.store'))">Let's Begin</PrimaryButton>
        </div>
      </div>
    </section>
  </StoryLayout>
</template>
