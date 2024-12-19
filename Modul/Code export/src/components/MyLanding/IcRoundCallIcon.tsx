import { memo, SVGProps } from 'react';

const IcRoundCallIcon = (props: SVGProps<SVGSVGElement>) => (
  <svg preserveAspectRatio='none' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg' {...props}>
    <path
      d='M19.23 15.26L16.69 14.97C16.3913 14.9349 16.0886 14.968 15.8046 15.0667C15.5205 15.1654 15.2625 15.3273 15.05 15.54L13.21 17.38C10.3712 15.9362 8.06378 13.6288 6.62 10.79L8.47 8.94C8.9 8.51 9.11 7.91 9.04 7.3L8.75 4.78C8.6933 4.29218 8.45919 3.84224 8.09224 3.51585C7.72528 3.18946 7.25111 3.00942 6.76 3.01H5.03C3.9 3.01 2.96 3.95 3.03 5.08C3.56 13.62 10.39 20.44 18.92 20.97C20.05 21.04 20.99 20.1 20.99 18.97V17.24C21 16.23 20.24 15.38 19.23 15.26V15.26Z'
      fill='#58D674'
    />
  </svg>
);

const Memo = memo(IcRoundCallIcon);
export { Memo as IcRoundCallIcon };
