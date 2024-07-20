<script lang="ts" setup>
  import { Head, useForm } from '@inertiajs/vue3'
  import StoryLayout from '@/Layouts/StoryLayout.vue'
  import { Project, ProjectStep } from '@/types'
  import PrimaryButton from '@/Components/PrimaryButton.vue'
  import { LogoutButton, ProgressBar, ProgressTimeline } from '@/Components/Story/v1/UI'

  const props = defineProps<{
    project: Project
    step: ProjectStep
    position: {
      step: string
      page: number
    }
  }>()

  const form = useForm({})

  const loadForm = () => {
    form.get(
      route('story.form', {
        project: props.project,
        step: props.position.step,
        token: props.project.token,
        page: props.position.page,
      })
    )
  }
</script>

<template>
  <Head title="Continue Form" />
  <StoryLayout>
    <template #top>
      <div class="p-2 flex justify-between items-start gap-2 bg-base-200">
        <h2 class="text-3xl">Slide Form Demo in Progress</h2>
        <div class="flex justify-between items-start gap-2">
          <ProgressTimeline v-once :project="project" :step="step" class="hidden lg:flex lg:justify-center" />
          <LogoutButton />
        </div>
      </div>
      <ProgressBar :step="step" class="lg:hidden" />
    </template>
    <section class="stretched">
      <div class="stretched contained centered">
        <div class="prose text-center">
          <p>You have already started the Slide Form Demo. You can continue where you left off.</p>
          <PrimaryButton class="sm:btn-sm md:btn-md lg:btn-lg xl:btn-xl" @click="loadForm">
            Go to Last Position
          </PrimaryButton>
        </div>
      </div>
    </section>
  </StoryLayout>
</template>
