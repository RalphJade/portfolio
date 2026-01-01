'use client';

import { Mail, Github, Linkedin, ExternalLink } from 'lucide-react';
import Lanyard from './Lanyard';

export default function Home() {
  const projects = [
    {
      title: 'E-Commerce Platform',
      description: 'Full-stack e-commerce solution with payment integration, inventory management, and admin dashboard.',
      technologies: ['Next.js', 'TypeScript', 'Tailwind CSS', 'Stripe', 'PostgreSQL'],
      link: '#',
      github: '#',
    },
    {
      title: 'Task Management App',
      description: 'Collaborative task management application with real-time updates and team collaboration features.',
      technologies: ['React', 'Node.js', 'MongoDB', 'Socket.io', 'Redux'],
      link: '#',
      github: '#',
    },
    {
      title: 'AI Content Generator',
      description: 'AI-powered content generation tool using OpenAI API for creating articles, social media posts, and more.',
      technologies: ['Next.js', 'OpenAI API', 'Tailwind CSS', 'TypeScript'],
      link: '#',
      github: '#',
    },
  ];

  const skills = [
    { category: 'Frontend', items: ['React', 'Next.js', 'TypeScript', 'Tailwind CSS', 'HTML5', 'CSS3'] },
    { category: 'Backend', items: ['Node.js', 'Express', 'PostgreSQL', 'MongoDB', 'REST APIs'] },
    { category: 'Tools', items: ['Git', 'Docker', 'VS Code', 'Figma', 'Linux'] },
    { category: 'Other', items: ['Web Design', 'SEO', 'Testing', 'CI/CD', 'Cloud Deployment'] },
  ];

  return (
    <div className="bg-white dark:bg-black text-black dark:text-white">
      {/* Navigation */}
      <nav className="sticky top-0 z-50 bg-white/80 dark:bg-black/80 backdrop-blur-md border-b border-zinc-200 dark:border-zinc-800">
        <div className="max-w-4xl mx-auto px-6 py-4 flex justify-between items-center">
          <h2 className="text-xl font-bold">Portfolio</h2>
          <div className="flex gap-6 text-sm">
            <a href="#about" className="hover:text-blue-600 dark:hover:text-blue-400">About</a>
            <a href="#projects" className="hover:text-blue-600 dark:hover:text-blue-400">Projects</a>
            <a href="#skills" className="hover:text-blue-600 dark:hover:text-blue-400">Skills</a>
            <a href="#contact" className="hover:text-blue-600 dark:hover:text-blue-400">Contact</a>
          </div>
        </div>
      </nav>

      {/* Hero Section */}
      <section className="relative overflow-hidden min-h-screen flex items-center">
        <div className="absolute inset-0 -z-10 w-full h-full">
          <Lanyard />
        </div>
        <div className="max-w-4xl mx-auto px-6 space-y-6 relative z-10 w-full">
          <h1 className="text-5xl sm:text-6xl font-bold tracking-tight">
            Hi, I'm a Full-Stack Developer
          </h1>
          <p className="text-xl text-zinc-600 dark:text-zinc-400 max-w-2xl">
            I create beautiful, functional web applications that solve real problems. Specialized in modern web technologies and user-centric design.
          </p>
          <div className="flex gap-4 pt-4">
            <a
              href="#contact"
              className="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
            >
              Get in touch
            </a>
            <a
              href="#projects"
              className="px-6 py-3 border border-zinc-300 dark:border-zinc-700 rounded-lg hover:bg-zinc-50 dark:hover:bg-zinc-900 transition-colors"
            >
              View my work
            </a>
          </div>
        </div>
      </section>

      {/* About Section */}
      <section id="about" className="max-w-4xl mx-auto px-6 py-20 border-t border-zinc-200 dark:border-zinc-800">
        <h2 className="text-3xl font-bold mb-8">About</h2>
        <p className="text-lg text-zinc-600 dark:text-zinc-400 leading-8 max-w-2xl">
          I'm a passionate developer with 5+ years of experience building web applications. I love working with modern technologies like React, Next.js, and TypeScript to create performant, scalable solutions. When I'm not coding, you'll find me exploring new technologies, contributing to open source, or writing about web development.
        </p>
      </section>

      {/* Projects Section */}
      <section id="projects" className="max-w-4xl mx-auto px-6 py-20 border-t border-zinc-200 dark:border-zinc-800">
        <h2 className="text-3xl font-bold mb-12">Featured Projects</h2>
        <div className="grid gap-8">
          {projects.map((project, idx) => (
            <div
              key={idx}
              className="border border-zinc-200 dark:border-zinc-800 rounded-lg p-8 hover:shadow-lg dark:hover:shadow-zinc-900/50 transition-shadow"
            >
              <h3 className="text-2xl font-bold mb-2">{project.title}</h3>
              <p className="text-zinc-600 dark:text-zinc-400 mb-4">{project.description}</p>
              <div className="flex flex-wrap gap-2 mb-6">
                {project.technologies.map((tech, i) => (
                  <span
                    key={i}
                    className="px-3 py-1 text-sm bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 rounded-full"
                  >
                    {tech}
                  </span>
                ))}
              </div>
              <div className="flex gap-4">
                <a
                  href={project.link}
                  className="flex items-center gap-2 text-blue-600 dark:text-blue-400 hover:underline"
                >
                  View Project <ExternalLink size={16} />
                </a>
                <a
                  href={project.github}
                  className="flex items-center gap-2 text-blue-600 dark:text-blue-400 hover:underline"
                >
                  GitHub <Github size={16} />
                </a>
              </div>
            </div>
          ))}
        </div>
      </section>

      {/* Skills Section */}
      <section id="skills" className="max-w-4xl mx-auto px-6 py-20 border-t border-zinc-200 dark:border-zinc-800">
        <h2 className="text-3xl font-bold mb-12">Skills</h2>
        <div className="grid sm:grid-cols-2 gap-8">
          {skills.map((skillGroup, idx) => (
            <div key={idx}>
              <h3 className="font-bold text-lg mb-4">{skillGroup.category}</h3>
              <div className="flex flex-wrap gap-2">
                {skillGroup.items.map((skill, i) => (
                  <span
                    key={i}
                    className="px-3 py-1 text-sm bg-zinc-100 dark:bg-zinc-900 rounded-full"
                  >
                    {skill}
                  </span>
                ))}
              </div>
            </div>
          ))}
        </div>
      </section>

      {/* Contact Section */}
      <section id="contact" className="max-w-4xl mx-auto px-6 py-20 border-t border-zinc-200 dark:border-zinc-800">
        <h2 className="text-3xl font-bold mb-8">Get In Touch</h2>
        <p className="text-lg text-zinc-600 dark:text-zinc-400 mb-8 max-w-2xl">
          Have a project in mind or want to collaborate? Feel free to reach out. I'm always interested in hearing about new opportunities.
        </p>
        <div className="flex flex-col sm:flex-row gap-6">
          <a
            href="mailto:hello@example.com"
            className="flex items-center gap-3 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors w-fit"
          >
            <Mail size={20} />
            Email Me
          </a>
          <a
            href="https://github.com"
            target="_blank"
            rel="noopener noreferrer"
            className="flex items-center gap-3 px-6 py-3 border border-zinc-300 dark:border-zinc-700 rounded-lg hover:bg-zinc-50 dark:hover:bg-zinc-900 transition-colors w-fit"
          >
            <Github size={20} />
            GitHub
          </a>
          <a
            href="https://linkedin.com"
            target="_blank"
            rel="noopener noreferrer"
            className="flex items-center gap-3 px-6 py-3 border border-zinc-300 dark:border-zinc-700 rounded-lg hover:bg-zinc-50 dark:hover:bg-zinc-900 transition-colors w-fit"
          >
            <Linkedin size={20} />
            LinkedIn
          </a>
        </div>
      </section>

      {/* Footer */}
      <footer className="border-t border-zinc-200 dark:border-zinc-800 py-8">
        <div className="max-w-4xl mx-auto px-6 text-center text-zinc-600 dark:text-zinc-400 text-sm">
          <p>© 2025 Portfolio. Built with Next.js and Tailwind CSS.</p>
        </div>
      </footer>
    </div>
  );
}
