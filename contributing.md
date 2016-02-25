# Contibution guidelines.

Looking to contribute something to Refugee? **Here's how you can help.**

Please take a moment to review this document in order to make the contribution process 
easy and effective for everyone involved. 

Following these guidelines helps to communicate that you respect the 
time of the developers managing and developing this open source project. In return, they should reciprocate that respect in addressing your issue or assessing patches and featurs. 

## Using the issue tracker 

The issue tracker is preferred channel for bug reports, 
feature requests and submitting pull requests.but please respect the following restrictions: 

- Please **do not** use the issue tracker for personal support requests. The Gitter channel 
is a better place to get help. 

- Please **do not** derail or troll issues. Keep the discussion on topic and respect the opinions of others.

- Please **do not** open issues or pull requests regarding the code in 3th party packages. 

## Issues and labels 

Our bug tracker utilizes several labels to help organize and identify issues. Here's what they represent
and how we use them:

- `API-docs` - Issues for improving or updating our API documentation.
- `API` -  Issues that are located in the API system of the platform.
- `back-end` - Issues that are located in the backend off the platform. 
- `front-end` - Issues that are located in the front-end off the platform. 
- `bug` -  Issues that are confirmed as bug. 
- `duplicate` - Issues that we found and are the same as antoher one.
- `enchancement` - Issues asking for a new feature to be added, or an existing one to be extended or modified. 
New features require a minor version bump (e.g., `v1.0.0` to `v1.1.0`)
- `help wanted`- Issues we need or would love help from the community to resolve. 
- `invalid` - Issues that we can not confirm.
- `question` -  Issues that are marked as a question or support question. 
- `wontfix` - Issues that we doesn't fix in the next release. 
- `meta` - Issues with the project or our GitHub repository.

For a complete look at our labels, see the project labels page.

## Bug reports

A bug is a *demonstrable problem* that is caused by the code in the repository. Good bug reports are extremely
helpful so thanks!

Guidelines for bug reports: 

1. **Use the GitHub issue search** -- check if the issue has already been reported.
2. **check if the issue has been fixed** -- Try to reproduce it using the latest `master branch` in the 
repository. 
3. **Isolate the problem** -- ideally create a reduced test case and a live example (if you can).

A good bug report shouldn't leave others needing to chase you up for more information. Please try to be 
as detailed as possible in your report. What is your environment? What steps will reporoduce the issue? 
What browser(s) and OS experience the problem? Do other browsers show the bug differently? What you expect to the
outcome? All these details will help people fix any potential bugs.

Example: 

> Short and descriptive example bug report title
>
> A summary of the issue and the browser/OS environment in which it occurs. If
> suitable, include the steps required to reproduce the bug.
>
> 1. This is the first step
> 2. This is the second step
> 3. Further steps, etc.
>
> `<url>` - a link to the reduced test case
>
> Any other information you want to share that is relevant to the issue being
> reported. This might include the lines of code that you have identified as
> causing the bug, and potential solutions (and your opinions on their
> merits).

## Pull requests 

Good pull reqiests -- patches, improvements, new features - are a fantastic help. They should remain focused
in scope and avoid containing unrelated commits.

**Please ask first** Before embarking on any significant pull request (e. g. implement features, refactoring code)
, porting to a different language), otherwise you risk spending a lot of time working on something that the project's
project's developers might not want to merge into the project. 

Pull requests should target the `development branch` where they will be welcomed and duly considered. Please
adhere to the PSR-2 coding standards that are used throughout the project (indentation, accurate comments, etc.) 
and any other requirements (such as test coverage).

**Do not edit the `.css`, `.js` and fonts directly in the public folder** Those files are automatically generated. 
You should edit the source files in `resources/assets/less` and/or `resources/assets/js` instead.

Adhering the following process is the best way to get your work included in the project. 

1. Fork the project, colone your fork, and configure remotes: 

```
# Clone your fork of the repo into the current directory
git clone https://github.com/<your username>/refugee.git
# Navigate to the newly cloned directory
cd refugee-master 
# Assign the orginal repo to a remote called "upstream"
git remote add upstream https://github.com/Tjoosten/refugee.git
```

2. If you cloned a while ago, get the latest changes form upstram:

```
git checkout development
git pull upstream development
```

3. Create a new topic branch (off the main development branch) to contain your feature, change, or fix:

```
git checkout -b <topic-branch-name>
```

4. Commit your changes in logical chunks. Please adhere to these git commit message guidelines
of your code us unlikely to be merged into the main project. Use Git's interactive rebase to
todfy up your commits before making them public.

5. Locally merge (or rebase) the upstream development branch into your topic branch:

```
git pull [--rebase] upstream master
```

6. Push your topic branch up to your fork:

```
git push origin <topic-name-branch>
```

7. Open a Pull request with a clear title and description against the development branch.

**Important:** By submitting a patch, you agree to allow the project owners to license your work
under the terms of the MIT License (If it includes code changes) and under the terms of the
Creative Commons Attribution 3.0 Unported license
(if it includes API documentation changes).

## Feature requests 

Feature requests are welcome, but please before opening a feature request, please take a moment to find out 
whether your idea fits with the scope and aims of the project. It's up to *you* to make a strong 
case to convince the project's developers of the merits of this feature, Pleaseprovide as much detail
and context as possible.