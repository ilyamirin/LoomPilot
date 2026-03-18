# Implementation Plan

This document is the execution plan for the autonomous coding demo. Each stage
has a clear Definition of Done so the project can be built incrementally while
remaining demoable.

## Stage 1. Repository Bootstrap

Scope:

- initialize the git repository
- create project documentation and architecture notes
- add Python project metadata
- add Docker Compose topology and service directories
- add a basic secret-scan script

Definition of Done:

- repository is initialized on branch `main`
- `.gitignore`, `.env.example`, `README.md`, and this plan exist
- `docker-compose.yml` exists and names all target services
- secret scan script exists and can be run locally
- first meaningful commit is created

## Stage 2. Core App Skeletons

Scope:

- implement `pet-app` as a FastAPI service with seeded seller data
- implement `control-room` as a FastAPI service with a dashboard template
- implement `orchestrator` as a FastAPI service with task APIs
- create shared storage helpers for tasks and events

Definition of Done:

- all three services start with `uvicorn`
- `pet-app` serves at least dashboard and orders pages
- `control-room` displays seeded tasks and events
- `orchestrator` exposes health and task endpoints
- automated tests cover the basic service contracts
- second meaningful commit is created

## Stage 3. Demo Data and Pipeline State

Scope:

- seed completed and backlog tasks aligned with the pet app
- model the task lifecycle states used in the demo
- make the control room reflect the current pipeline state
- allow the orchestrator to advance tasks locally

Definition of Done:

- at least 8 completed tasks and 12 backlog tasks are seeded
- task status transitions are persisted
- event timeline is visible in control room
- local demo flow can move a task from `ready` to `done`
- third meaningful commit is created

## Stage 4. Kanboard Integration

Scope:

- add seed scripts to create the Kanboard project, columns, user, and tasks
- synchronize local pipeline tasks with Kanboard cards
- poll Kanboard for tasks moved to `Ready`

Definition of Done:

- Kanboard project is created by script
- `Ilya Mirin <Mirin.Ilya@rwb.ru>` exists as a Kanboard user
- demo tasks are created in the correct columns
- moving a card to `Ready` is reflected in the orchestrator
- integration is documented

## Stage 5. Git and CI/CD Integration

Scope:

- prepare Gitea configuration for local use
- add Woodpecker configuration placeholders and pipeline definitions
- connect orchestrator events to repository workflow artifacts

Definition of Done:

- Gitea is reachable in Compose
- Woodpecker services are defined and documented
- repository workflow file exists for CI/CD demo
- control room can render links for repo and pipeline artifacts
- no secrets are present in version control

## Stage 6. Demo Narrative Hardening

Scope:

- refine the UI of `pet-app` and `control-room`
- add example demo scenarios
- improve onboarding and runbook documentation

Definition of Done:

- end-to-end demo steps are documented
- the stack is visually coherent enough for a live walkthrough
- there is a stable scripted happy path for at least one bug fix scenario
- final validation pass and release notes commit are created
