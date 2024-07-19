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
  <Head title="Slide Form Demo" />
  <StoryLayout>
    <template #top>
      <div class="p-2 flex justify-between items-start gap-2 bg-base-200">
        <h2 class="text-3xl">
          {{ step.name }}
        </h2>
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
    <IntroForm
      v-if="step.id === 'intro'"
      :project="project"
      :step="step"
      :page="page"
      :direction="direction"
      :token="token"
      :story="story as IntroFormFields"
    />
    <SectionAForm
      v-if="step.id === 'section-a'"
      :project="project"
      :step="step"
      :page="page"
      :direction="direction"
      :token="token"
      :story="story as SectionAFormFields"
    />
    <SectionBForm
      v-if="step.id === 'section-b'"
      :project="project"
      :step="step"
      :page="page"
      :direction="direction"
      :token="token"
      :story="story as SectionBFormFields"
    />
    <SectionCForm
      v-if="step.id === 'section-c'"
      :project="project"
      :step="step"
      :page="page"
      :direction="direction"
      :token="token"
      :story="story as SectionCFormFields"
    />
  </StoryLayout>
</template>
