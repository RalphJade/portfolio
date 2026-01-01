import { Geist, Geist_Mono } from "next/font/google";
import "./globals.css";

const geistSans = Geist({
  variable: "--font-geist-sans",
  subsets: ["latin"],
});

const geistMono = Geist_Mono({
  variable: "--font-geist-mono",
  subsets: ["latin"],
});

export const metadata = {
  title: "Portfolio - Full-Stack Developer",
  description: "Showcasing my web development projects and skills. Built with Next.js, React, and modern web technologies.",
  keywords: ["web development", "full-stack", "next.js", "react", "typescript"],
  authors: [{ name: "Portfolio" }],
  openGraph: {
    title: "Portfolio - Full-Stack Developer",
    description: "Showcasing my web development projects and skills",
    type: "website",
  },
};

export default function RootLayout({ children }) {
  return (
    <html lang="en">
      <body
        className={`${geistSans.variable} ${geistMono.variable} antialiased`}
      >
        {children}
      </body>
    </html>
  );
}
