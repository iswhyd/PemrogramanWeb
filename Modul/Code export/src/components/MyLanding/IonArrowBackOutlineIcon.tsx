import { memo, SVGProps } from 'react';

const IonArrowBackOutlineIcon = (props: SVGProps<SVGSVGElement>) => (
  <svg preserveAspectRatio='none' viewBox='0 0 64 64' fill='none' xmlns='http://www.w3.org/2000/svg' {...props}>
    <path d='M50 33.5L32 51.5L14 33.5' stroke='#333333' strokeWidth={4} strokeLinecap='round' strokeLinejoin='round' />
    <path d='M32 49L32 12.5' stroke='#333333' strokeWidth={4} strokeLinecap='round' strokeLinejoin='round' />
  </svg>
);

const Memo = memo(IonArrowBackOutlineIcon);
export { Memo as IonArrowBackOutlineIcon };
