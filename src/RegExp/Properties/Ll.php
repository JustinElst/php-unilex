<?php

/** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

namespace Remorhaz\UniLex\Tool\RegExp\Properties;

use Remorhaz\UniLex\RegExp\FSM\Range;
use Remorhaz\UniLex\RegExp\FSM\RangeSet;

/** phpcs:disable Generic.Files.LineLength.TooLong */
return RangeSet::loadUnsafe(new Range(0x61, 0x7a), new Range(0xb5), new Range(0xdf, 0xf6), new Range(0xf8, 0xff), new Range(0x101), new Range(0x103), new Range(0x105), new Range(0x107), new Range(0x109), new Range(0x10b), new Range(0x10d), new Range(0x10f), new Range(0x111), new Range(0x113), new Range(0x115), new Range(0x117), new Range(0x119), new Range(0x11b), new Range(0x11d), new Range(0x11f), new Range(0x121), new Range(0x123), new Range(0x125), new Range(0x127), new Range(0x129), new Range(0x12b), new Range(0x12d), new Range(0x12f), new Range(0x131), new Range(0x133), new Range(0x135), new Range(0x137, 0x138), new Range(0x13a), new Range(0x13c), new Range(0x13e), new Range(0x140), new Range(0x142), new Range(0x144), new Range(0x146), new Range(0x148, 0x149), new Range(0x14b), new Range(0x14d), new Range(0x14f), new Range(0x151), new Range(0x153), new Range(0x155), new Range(0x157), new Range(0x159), new Range(0x15b), new Range(0x15d), new Range(0x15f), new Range(0x161), new Range(0x163), new Range(0x165), new Range(0x167), new Range(0x169), new Range(0x16b), new Range(0x16d), new Range(0x16f), new Range(0x171), new Range(0x173), new Range(0x175), new Range(0x177), new Range(0x17a), new Range(0x17c), new Range(0x17e, 0x180), new Range(0x183), new Range(0x185), new Range(0x188), new Range(0x18c, 0x18d), new Range(0x192), new Range(0x195), new Range(0x199, 0x19b), new Range(0x19e), new Range(0x1a1), new Range(0x1a3), new Range(0x1a5), new Range(0x1a8), new Range(0x1aa, 0x1ab), new Range(0x1ad), new Range(0x1b0), new Range(0x1b4), new Range(0x1b6), new Range(0x1b9, 0x1ba), new Range(0x1bd, 0x1bf), new Range(0x1c6), new Range(0x1c9), new Range(0x1cc), new Range(0x1ce), new Range(0x1d0), new Range(0x1d2), new Range(0x1d4), new Range(0x1d6), new Range(0x1d8), new Range(0x1da), new Range(0x1dc, 0x1dd), new Range(0x1df), new Range(0x1e1), new Range(0x1e3), new Range(0x1e5), new Range(0x1e7), new Range(0x1e9), new Range(0x1eb), new Range(0x1ed), new Range(0x1ef, 0x1f0), new Range(0x1f3), new Range(0x1f5), new Range(0x1f9), new Range(0x1fb), new Range(0x1fd), new Range(0x1ff), new Range(0x201), new Range(0x203), new Range(0x205), new Range(0x207), new Range(0x209), new Range(0x20b), new Range(0x20d), new Range(0x20f), new Range(0x211), new Range(0x213), new Range(0x215), new Range(0x217), new Range(0x219), new Range(0x21b), new Range(0x21d), new Range(0x21f), new Range(0x221), new Range(0x223), new Range(0x225), new Range(0x227), new Range(0x229), new Range(0x22b), new Range(0x22d), new Range(0x22f), new Range(0x231), new Range(0x233, 0x239), new Range(0x23c), new Range(0x23f, 0x240), new Range(0x242), new Range(0x247), new Range(0x249), new Range(0x24b), new Range(0x24d), new Range(0x24f, 0x293), new Range(0x295, 0x2af), new Range(0x371), new Range(0x373), new Range(0x377), new Range(0x37b, 0x37d), new Range(0x390), new Range(0x3ac, 0x3ce), new Range(0x3d0, 0x3d1), new Range(0x3d5, 0x3d7), new Range(0x3d9), new Range(0x3db), new Range(0x3dd), new Range(0x3df), new Range(0x3e1), new Range(0x3e3), new Range(0x3e5), new Range(0x3e7), new Range(0x3e9), new Range(0x3eb), new Range(0x3ed), new Range(0x3ef, 0x3f3), new Range(0x3f5), new Range(0x3f8), new Range(0x3fb, 0x3fc), new Range(0x430, 0x45f), new Range(0x461), new Range(0x463), new Range(0x465), new Range(0x467), new Range(0x469), new Range(0x46b), new Range(0x46d), new Range(0x46f), new Range(0x471), new Range(0x473), new Range(0x475), new Range(0x477), new Range(0x479), new Range(0x47b), new Range(0x47d), new Range(0x47f), new Range(0x481), new Range(0x48b), new Range(0x48d), new Range(0x48f), new Range(0x491), new Range(0x493), new Range(0x495), new Range(0x497), new Range(0x499), new Range(0x49b), new Range(0x49d), new Range(0x49f), new Range(0x4a1), new Range(0x4a3), new Range(0x4a5), new Range(0x4a7), new Range(0x4a9), new Range(0x4ab), new Range(0x4ad), new Range(0x4af), new Range(0x4b1), new Range(0x4b3), new Range(0x4b5), new Range(0x4b7), new Range(0x4b9), new Range(0x4bb), new Range(0x4bd), new Range(0x4bf), new Range(0x4c2), new Range(0x4c4), new Range(0x4c6), new Range(0x4c8), new Range(0x4ca), new Range(0x4cc), new Range(0x4ce, 0x4cf), new Range(0x4d1), new Range(0x4d3), new Range(0x4d5), new Range(0x4d7), new Range(0x4d9), new Range(0x4db), new Range(0x4dd), new Range(0x4df), new Range(0x4e1), new Range(0x4e3), new Range(0x4e5), new Range(0x4e7), new Range(0x4e9), new Range(0x4eb), new Range(0x4ed), new Range(0x4ef), new Range(0x4f1), new Range(0x4f3), new Range(0x4f5), new Range(0x4f7), new Range(0x4f9), new Range(0x4fb), new Range(0x4fd), new Range(0x4ff), new Range(0x501), new Range(0x503), new Range(0x505), new Range(0x507), new Range(0x509), new Range(0x50b), new Range(0x50d), new Range(0x50f), new Range(0x511), new Range(0x513), new Range(0x515), new Range(0x517), new Range(0x519), new Range(0x51b), new Range(0x51d), new Range(0x51f), new Range(0x521), new Range(0x523), new Range(0x525), new Range(0x527), new Range(0x529), new Range(0x52b), new Range(0x52d), new Range(0x52f), new Range(0x560, 0x588), new Range(0x10d0, 0x10fa), new Range(0x10fd, 0x10ff), new Range(0x13f8, 0x13fd), new Range(0x1c80, 0x1c88), new Range(0x1d00, 0x1d2b), new Range(0x1d6b, 0x1d77), new Range(0x1d79, 0x1d9a), new Range(0x1e01), new Range(0x1e03), new Range(0x1e05), new Range(0x1e07), new Range(0x1e09), new Range(0x1e0b), new Range(0x1e0d), new Range(0x1e0f), new Range(0x1e11), new Range(0x1e13), new Range(0x1e15), new Range(0x1e17), new Range(0x1e19), new Range(0x1e1b), new Range(0x1e1d), new Range(0x1e1f), new Range(0x1e21), new Range(0x1e23), new Range(0x1e25), new Range(0x1e27), new Range(0x1e29), new Range(0x1e2b), new Range(0x1e2d), new Range(0x1e2f), new Range(0x1e31), new Range(0x1e33), new Range(0x1e35), new Range(0x1e37), new Range(0x1e39), new Range(0x1e3b), new Range(0x1e3d), new Range(0x1e3f), new Range(0x1e41), new Range(0x1e43), new Range(0x1e45), new Range(0x1e47), new Range(0x1e49), new Range(0x1e4b), new Range(0x1e4d), new Range(0x1e4f), new Range(0x1e51), new Range(0x1e53), new Range(0x1e55), new Range(0x1e57), new Range(0x1e59), new Range(0x1e5b), new Range(0x1e5d), new Range(0x1e5f), new Range(0x1e61), new Range(0x1e63), new Range(0x1e65), new Range(0x1e67), new Range(0x1e69), new Range(0x1e6b), new Range(0x1e6d), new Range(0x1e6f), new Range(0x1e71), new Range(0x1e73), new Range(0x1e75), new Range(0x1e77), new Range(0x1e79), new Range(0x1e7b), new Range(0x1e7d), new Range(0x1e7f), new Range(0x1e81), new Range(0x1e83), new Range(0x1e85), new Range(0x1e87), new Range(0x1e89), new Range(0x1e8b), new Range(0x1e8d), new Range(0x1e8f), new Range(0x1e91), new Range(0x1e93), new Range(0x1e95, 0x1e9d), new Range(0x1e9f), new Range(0x1ea1), new Range(0x1ea3), new Range(0x1ea5), new Range(0x1ea7), new Range(0x1ea9), new Range(0x1eab), new Range(0x1ead), new Range(0x1eaf), new Range(0x1eb1), new Range(0x1eb3), new Range(0x1eb5), new Range(0x1eb7), new Range(0x1eb9), new Range(0x1ebb), new Range(0x1ebd), new Range(0x1ebf), new Range(0x1ec1), new Range(0x1ec3), new Range(0x1ec5), new Range(0x1ec7), new Range(0x1ec9), new Range(0x1ecb), new Range(0x1ecd), new Range(0x1ecf), new Range(0x1ed1), new Range(0x1ed3), new Range(0x1ed5), new Range(0x1ed7), new Range(0x1ed9), new Range(0x1edb), new Range(0x1edd), new Range(0x1edf), new Range(0x1ee1), new Range(0x1ee3), new Range(0x1ee5), new Range(0x1ee7), new Range(0x1ee9), new Range(0x1eeb), new Range(0x1eed), new Range(0x1eef), new Range(0x1ef1), new Range(0x1ef3), new Range(0x1ef5), new Range(0x1ef7), new Range(0x1ef9), new Range(0x1efb), new Range(0x1efd), new Range(0x1eff, 0x1f07), new Range(0x1f10, 0x1f15), new Range(0x1f20, 0x1f27), new Range(0x1f30, 0x1f37), new Range(0x1f40, 0x1f45), new Range(0x1f50, 0x1f57), new Range(0x1f60, 0x1f67), new Range(0x1f70, 0x1f7d), new Range(0x1f80, 0x1f87), new Range(0x1f90, 0x1f97), new Range(0x1fa0, 0x1fa7), new Range(0x1fb0, 0x1fb4), new Range(0x1fb6, 0x1fb7), new Range(0x1fbe), new Range(0x1fc2, 0x1fc4), new Range(0x1fc6, 0x1fc7), new Range(0x1fd0, 0x1fd3), new Range(0x1fd6, 0x1fd7), new Range(0x1fe0, 0x1fe7), new Range(0x1ff2, 0x1ff4), new Range(0x1ff6, 0x1ff7), new Range(0x210a), new Range(0x210e, 0x210f), new Range(0x2113), new Range(0x212f), new Range(0x2134), new Range(0x2139), new Range(0x213c, 0x213d), new Range(0x2146, 0x2149), new Range(0x214e), new Range(0x2184), new Range(0x2c30, 0x2c5e), new Range(0x2c61), new Range(0x2c65, 0x2c66), new Range(0x2c68), new Range(0x2c6a), new Range(0x2c6c), new Range(0x2c71), new Range(0x2c73, 0x2c74), new Range(0x2c76, 0x2c7b), new Range(0x2c81), new Range(0x2c83), new Range(0x2c85), new Range(0x2c87), new Range(0x2c89), new Range(0x2c8b), new Range(0x2c8d), new Range(0x2c8f), new Range(0x2c91), new Range(0x2c93), new Range(0x2c95), new Range(0x2c97), new Range(0x2c99), new Range(0x2c9b), new Range(0x2c9d), new Range(0x2c9f), new Range(0x2ca1), new Range(0x2ca3), new Range(0x2ca5), new Range(0x2ca7), new Range(0x2ca9), new Range(0x2cab), new Range(0x2cad), new Range(0x2caf), new Range(0x2cb1), new Range(0x2cb3), new Range(0x2cb5), new Range(0x2cb7), new Range(0x2cb9), new Range(0x2cbb), new Range(0x2cbd), new Range(0x2cbf), new Range(0x2cc1), new Range(0x2cc3), new Range(0x2cc5), new Range(0x2cc7), new Range(0x2cc9), new Range(0x2ccb), new Range(0x2ccd), new Range(0x2ccf), new Range(0x2cd1), new Range(0x2cd3), new Range(0x2cd5), new Range(0x2cd7), new Range(0x2cd9), new Range(0x2cdb), new Range(0x2cdd), new Range(0x2cdf), new Range(0x2ce1), new Range(0x2ce3, 0x2ce4), new Range(0x2cec), new Range(0x2cee), new Range(0x2cf3), new Range(0x2d00, 0x2d25), new Range(0x2d27), new Range(0x2d2d), new Range(0xa641), new Range(0xa643), new Range(0xa645), new Range(0xa647), new Range(0xa649), new Range(0xa64b), new Range(0xa64d), new Range(0xa64f), new Range(0xa651), new Range(0xa653), new Range(0xa655), new Range(0xa657), new Range(0xa659), new Range(0xa65b), new Range(0xa65d), new Range(0xa65f), new Range(0xa661), new Range(0xa663), new Range(0xa665), new Range(0xa667), new Range(0xa669), new Range(0xa66b), new Range(0xa66d), new Range(0xa681), new Range(0xa683), new Range(0xa685), new Range(0xa687), new Range(0xa689), new Range(0xa68b), new Range(0xa68d), new Range(0xa68f), new Range(0xa691), new Range(0xa693), new Range(0xa695), new Range(0xa697), new Range(0xa699), new Range(0xa69b), new Range(0xa723), new Range(0xa725), new Range(0xa727), new Range(0xa729), new Range(0xa72b), new Range(0xa72d), new Range(0xa72f, 0xa731), new Range(0xa733), new Range(0xa735), new Range(0xa737), new Range(0xa739), new Range(0xa73b), new Range(0xa73d), new Range(0xa73f), new Range(0xa741), new Range(0xa743), new Range(0xa745), new Range(0xa747), new Range(0xa749), new Range(0xa74b), new Range(0xa74d), new Range(0xa74f), new Range(0xa751), new Range(0xa753), new Range(0xa755), new Range(0xa757), new Range(0xa759), new Range(0xa75b), new Range(0xa75d), new Range(0xa75f), new Range(0xa761), new Range(0xa763), new Range(0xa765), new Range(0xa767), new Range(0xa769), new Range(0xa76b), new Range(0xa76d), new Range(0xa76f), new Range(0xa771, 0xa778), new Range(0xa77a), new Range(0xa77c), new Range(0xa77f), new Range(0xa781), new Range(0xa783), new Range(0xa785), new Range(0xa787), new Range(0xa78c), new Range(0xa78e), new Range(0xa791), new Range(0xa793, 0xa795), new Range(0xa797), new Range(0xa799), new Range(0xa79b), new Range(0xa79d), new Range(0xa79f), new Range(0xa7a1), new Range(0xa7a3), new Range(0xa7a5), new Range(0xa7a7), new Range(0xa7a9), new Range(0xa7af), new Range(0xa7b5), new Range(0xa7b7), new Range(0xa7b9), new Range(0xa7bb), new Range(0xa7bd), new Range(0xa7bf), new Range(0xa7c3), new Range(0xa7c8), new Range(0xa7ca), new Range(0xa7f6), new Range(0xa7fa), new Range(0xab30, 0xab5a), new Range(0xab60, 0xab68), new Range(0xab70, 0xabbf), new Range(0xfb00, 0xfb06), new Range(0xfb13, 0xfb17), new Range(0xff41, 0xff5a), new Range(0x10428, 0x1044f), new Range(0x104d8, 0x104fb), new Range(0x10cc0, 0x10cf2), new Range(0x118c0, 0x118df), new Range(0x16e60, 0x16e7f), new Range(0x1d41a, 0x1d433), new Range(0x1d44e, 0x1d454), new Range(0x1d456, 0x1d467), new Range(0x1d482, 0x1d49b), new Range(0x1d4b6, 0x1d4b9), new Range(0x1d4bb), new Range(0x1d4bd, 0x1d4c3), new Range(0x1d4c5, 0x1d4cf), new Range(0x1d4ea, 0x1d503), new Range(0x1d51e, 0x1d537), new Range(0x1d552, 0x1d56b), new Range(0x1d586, 0x1d59f), new Range(0x1d5ba, 0x1d5d3), new Range(0x1d5ee, 0x1d607), new Range(0x1d622, 0x1d63b), new Range(0x1d656, 0x1d66f), new Range(0x1d68a, 0x1d6a5), new Range(0x1d6c2, 0x1d6da), new Range(0x1d6dc, 0x1d6e1), new Range(0x1d6fc, 0x1d714), new Range(0x1d716, 0x1d71b), new Range(0x1d736, 0x1d74e), new Range(0x1d750, 0x1d755), new Range(0x1d770, 0x1d788), new Range(0x1d78a, 0x1d78f), new Range(0x1d7aa, 0x1d7c2), new Range(0x1d7c4, 0x1d7c9), new Range(0x1d7cb), new Range(0x1e922, 0x1e943));
