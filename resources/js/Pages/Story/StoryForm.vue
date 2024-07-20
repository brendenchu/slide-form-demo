<script lang="ts" setup>
  import { Head } from '@inertiajs/vue3'
  import {
    AnyFormFields,
    IntroFormFields,
    Project,
    ProjectStep,
    SectionAFormFields,
    SectionBFormFields,
    SectionCFormFields,
  } from '@/types'
  import { IntroForm, SectionAForm, SectionBForm, SectionCForm } from '@/Components/Story/v1/Forms'
  import { Direction } from '@/Components/Slide/types'
  import StoryLayout from '@/Layouts/StoryLayout.vue'
  import { LogoutButton, ProgressBar, ProgressTimeline } from '@/Components/Story/v1/UI'

  defineProps<{
    project: Project
    step: ProjectStep
    token: string
    page: number
    direction: Direction
    story: AnyFormFields
  }>()
</script>

<template>
  <Head title="Form in progress" />
  <StoryLayout>
    <template #top>
      <div class="p-2 flex justify-between items-start gap-2 bg-base-200">
        <h2 class="text-3xl">
          {{ step.name }}
        </h2>
        <div class="flex justify-between items-start gap-2">
          <ProgressTimeline
            v-once
            :project="project"
            :step="step"
            :token="token"
            class="hidden lg:flex lg:justify-center"
          />
          <LogoutButton />
        </div>
      </div>
      <ProgressBar :step="step" class="lg:hidden" />
    </template>
    <IntroForm
      v-if="step.id === 'intro'"
      :direction="direction"
      :page="page"
      :project="project"
      :step="step"
      :story="story as IntroFormFields"
      :token="token"
    />
    <SectionAForm
      v-if="step.id === 'section-a'"
      :direction="direction"
      :page="page"
      :project="project"
      :step="step"
      :story="story as SectionAFormFields"
      :token="token"
    />
    <SectionBForm
      v-if="step.id === 'section-b'"
      :direction="direction"
      :page="page"
      :project="project"
      :step="step"
      :story="story as SectionBFormFields"
      :token="token"
    />
    <SectionCForm
      v-if="step.id === 'section-c'"
      :direction="direction"
      :page="page"
      :project="project"
      :step="step"
      :story="story as SectionCFormFields"
      :token="token"
    />
  </StoryLayout>
</template>
