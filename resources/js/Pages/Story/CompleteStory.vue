<script lang="ts" setup>
  import { Head, Link } from '@inertiajs/vue3'
  import StoryLayout from '@/Layouts/StoryLayout.vue'
  import { Project, ProjectStep } from '@/types'
  import PrimaryButton from '@/Components/PrimaryButton.vue'
  import { LogoutButton, ProgressBar, ProgressTimeline } from '@/Components/Story/v1/UI'
  import axios from 'axios'

  defineProps<{
    project: Project
    step: ProjectStep
    token: string
    allSteps: Record<string, string>
  }>()

  function logoutUser() {
    axios.post(route('logout')).then(() => {
      window.location.href = route('home')
    })
  }
</script>

<template>
  <Head title="Slide Form Demo" />
  <StoryLayout>
    <template #top>
      <div class="p-2 flex justify-between items-start gap-2 bg-base-200">
        <h2 class="text-3xl">You have completed the Slide Form Demo</h2>
        <div class="flex justify-between items-start gap-2">
          <ProgressTimeline
            v-once
            class="hidden lg:flex lg:justify-center"
            :project="project"
            :step="step"
            :token="token"
          />
          <LogoutButton />
        </div>
      </div>
      <ProgressBar class="lg:hidden" :step="step" />
    </template>
    <section class="stretched">
      <div class="stretched contained centered">
        <div class="w-1/2 prose">
          <p>Congratulations! You have completed the Slide Form Demo.</p>
          <p>From here, you have two options:</p>
          <ol>
            <li>
              <p>You can revisit any of the sections of the form to make changes.</p>
              <ul class="prose-sm">
                <li v-for="(name, slug) in allSteps" :key="slug">
                  <Link :href="route('story.form', { project: project.id, step: slug, token })" class="hover:font-bold">
                    {{ name }}
                  </Link>
                </li>
              </ul>
            </li>
            <li>
              <p>You can log out and have a great day!</p>
              <PrimaryButton class="btn-sm" @click="logoutUser"> Log Out</PrimaryButton>
            </li>
          </ol>
        </div>
      </div>
    </section>
  </StoryLayout>
</template>
