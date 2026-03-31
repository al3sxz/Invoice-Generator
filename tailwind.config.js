/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
     darkMode: 'class',
    theme: {
      extend: {
        fontFamily: {
          display: ['Syne', 'sans-serif'],
          body: ['DM Sans', 'sans-serif'],
        },
        colors: {
          void: '#060608',
          surface: '#0d0d12',
          panel: '#12121a',
          card: '#16161f',
          border: '#1e1e2e',
          muted: '#2a2a3d',
          subtle: '#3d3d5c',
          dim: '#6b6b8a',
          ghost: '#9898b0',
          silver: '#c4c4d4',
          snow: '#f0f0f8',
          'neon-cyan': '#00e5ff',
          'neon-violet': '#7c3aed',
          'neon-rose': '#f43f5e',
          'neon-amber': '#f59e0b',
          'neon-green': '#10b981',
          'grad-start': '#6d28d9',
          'grad-end': '#0ea5e9',
        },
        boxShadow: {
          'glow-cyan': '0 0 20px rgba(0,229,255,0.25), 0 0 60px rgba(0,229,255,0.08)',
          'glow-violet': '0 0 20px rgba(124,58,237,0.35), 0 0 60px rgba(124,58,237,0.12)',
          'glow-rose': '0 0 20px rgba(244,63,94,0.3), 0 0 60px rgba(244,63,94,0.1)',
          'glow-sm': '0 0 10px rgba(0,229,255,0.15)',
          'card': '0 1px 0 rgba(255,255,255,0.04), 0 4px 32px rgba(0,0,0,0.6)',
          'card-hover': '0 1px 0 rgba(255,255,255,0.06), 0 8px 48px rgba(0,0,0,0.8), 0 0 0 1px rgba(124,58,237,0.2)',
        },
        backgroundImage: {
          'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
          'mesh-1': 'radial-gradient(ellipse at 20% 50%, rgba(124,58,237,0.15) 0%, transparent 60%), radial-gradient(ellipse at 80% 20%, rgba(0,229,255,0.1) 0%, transparent 50%)',
          'shimmer': 'linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.05) 50%, transparent 100%)',
        },
        animation: {
          'shimmer': 'shimmer 2.5s infinite',
          'pulse-glow': 'pulseGlow 2s ease-in-out infinite',
          'slide-in': 'slideIn 0.3s cubic-bezier(0.16, 1, 0.3, 1)',
          'fade-up': 'fadeUp 0.4s cubic-bezier(0.16, 1, 0.3, 1)',
          'badge-pop': 'badgePop 0.3s cubic-bezier(0.34, 1.56, 0.64, 1)',
        },
        keyframes: {
          shimmer: { '0%': { backgroundPosition: '-200% 0' }, '100%': { backgroundPosition: '200% 0' } },
          pulseGlow: { '0%,100%': { opacity: '1' }, '50%': { opacity: '0.6' } },
          slideIn: { '0%': { transform: 'translateX(-16px)', opacity: '0' }, '100%': { transform: 'translateX(0)', opacity: '1' } },
          fadeUp: { '0%': { transform: 'translateY(12px)', opacity: '0' }, '100%': { transform: 'translateY(0)', opacity: '1' } },
          badgePop: { '0%': { transform: 'scale(0.5)', opacity: '0' }, '100%': { transform: 'scale(1)', opacity: '1' } },
        }
      }
    },
  
    
  plugins: [],
}   

